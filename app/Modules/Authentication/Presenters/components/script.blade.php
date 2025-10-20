<script>

    let showPassword = false;

    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('password-toggle');
        
        showPassword = !showPassword;
        passwordInput.type = showPassword ? 'text' : 'password';
        toggleIcon.setAttribute('data-lucide', showPassword ? 'eye-off' : 'eye');
        
        window.lucide.createIcons({ icons: window.lucide.icons });
    }

    function validateEmail(email) {
        const emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    }

    function showError(fieldId, message) {
        const errorElement = document.getElementById(fieldId + '-error');
        const iconElement = document.getElementById(fieldId + '-icon');
        const inputElement = document.getElementById(fieldId);
        
        errorElement.textContent = message;
        errorElement.classList.remove('hidden');
        iconElement.classList.remove('text-gray-400');
        iconElement.classList.add('text-red-400');
        inputElement.classList.remove('border-white/40', 'focus:border-blue-400');
        inputElement.classList.add('border-red-300/50', 'focus:border-red-400');
    }

    function clearError(fieldId) {
        const errorElement = document.getElementById(fieldId + '-error');
        const iconElement = document.getElementById(fieldId + '-icon');
        const inputElement = document.getElementById(fieldId);
        
        errorElement.classList.add('hidden');
        iconElement.classList.remove('text-red-400');
        iconElement.classList.add('text-gray-400');
        inputElement.classList.remove('border-red-300/50', 'focus:border-red-400');
        inputElement.classList.add('border-white/40', 'focus:border-blue-400');
    }

    function handleGoogleSignIn() {
        console.log('Google sign-in clicked');
        alert('Google sign-in clicked! Implement OAuth logic here.');
        // Handle Google OAuth here
    }

    // Clear errors when user starts typing
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    
    if (usernameInput) {
        usernameInput.addEventListener('input', function() {
            if (!document.getElementById('username-error').classList.contains('hidden')) {
                clearError('username');
            }
        });
    }

    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            if (!document.getElementById('password-error').classList.contains('hidden')) {
                clearError('password');
            }
        });
    }
</script>

<script>
    // Handle toast notification from logout
    document.addEventListener('DOMContentLoaded', () => {
        // Check for toast data from sessionStorage (from logout)
        const toastData = sessionStorage.getItem('toast_data');
        if (toastData) {
            try {
                const data = JSON.parse(toastData);
                setTimeout(() => {
                    if (window.toast) {
                        window.toast.show(data.message, data.type, 4000);
                    } else {
                        console.log('Toast message:', data.message);
                    }
                }, 500); // Delay sedikit untuk memastikan toast utility sudah loaded
                sessionStorage.removeItem('toast_data');
            } catch (error) {
                console.error('Error parsing toast data:', error);
                sessionStorage.removeItem('toast_data');
            }
        }

        // Check for toast from URL parameters (fallback)
        const urlParams = new URLSearchParams(window.location.search);
        const toastType = urlParams.get('toast');
        const toastMessage = urlParams.get('message');
        
        if (toastType && toastMessage) {
            setTimeout(() => {
                if (window.toast) {
                    window.toast.show(decodeURIComponent(toastMessage), toastType, 4000);
                }
            }, 500);
            
            // Clean URL
            const url = new URL(window.location);
            url.searchParams.delete('toast');
            url.searchParams.delete('message');
            window.history.replaceState({}, document.title, url);
        }
    });
</script>
