document.addEventListener('DOMContentLoaded', () => {
    // Handle toast notification from logout
    const toastData = sessionStorage.getItem('toast_data');
    if (toastData) {
        try {
            const data = JSON.parse(toastData);
            
            // Wait for toast utility to be available
            const showToast = () => {
                if (window.toast) {
                    window.toast.show(data.message, data.type, 4000);
                    sessionStorage.removeItem('toast_data');
                } else {
                    // Retry after 100ms if toast utility not ready
                    setTimeout(showToast, 100);
                }
            };
            
            setTimeout(showToast, 100);
        } catch (error) {
            console.error('Error parsing toast data:', error);
            sessionStorage.removeItem('toast_data');
        }
    }
});