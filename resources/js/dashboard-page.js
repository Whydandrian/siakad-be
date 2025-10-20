document.addEventListener('DOMContentLoaded', () => {
    // Handle toast notification from login success
    const showLoginSuccessToast = () => {
        // Check if toast utility is available
        if (window.toast) {
            // Get toast data from meta tag (set by Laravel)
            const toastData = document.querySelector('meta[name="toast-data"]');
            if (toastData) {
                try {
                    const data = JSON.parse(toastData.getAttribute('content'));
                    if (data.message && data.type) {
                        window.toast.show(data.message, data.type, 4000);
                    }
                } catch (error) {
                    console.error('Error parsing toast data:', error);
                }
            }
        } else {
            // Retry after 100ms if toast utility not ready
            setTimeout(showLoginSuccessToast, 100);
        }
    };

    // Show toast with a small delay to ensure everything is loaded
    setTimeout(showLoginSuccessToast, 200);
});