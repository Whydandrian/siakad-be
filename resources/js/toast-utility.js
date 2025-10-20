class ToastUtility {
    constructor() {
        this.container = null;
        this.createContainer();
    }

    createContainer() {
        // Create toast container if it doesn't exist
        if (!document.getElementById('toast-container')) {
            const container = document.createElement('div');
            container.id = 'toast-container';
            container.className = 'fixed top-5 right-5 z-[100] space-y-3';
            document.body.appendChild(container);
            this.container = container;
        } else {
            this.container = document.getElementById('toast-container');
        }
    }

    show(message, type = 'info', duration = 4000) {
        const toast = this.createToast(message, type);
        this.container.appendChild(toast);

        // Show animation
        setTimeout(() => {
            toast.classList.add('opacity-100', 'translate-x-0');
            toast.classList.remove('opacity-0', 'translate-x-full');
        }, 10);

        // Auto dismiss
        setTimeout(() => {
            this.dismiss(toast);
        }, duration);

        return toast;
    }

    createToast(message, type) {
        const toast = document.createElement('div');
        const { bgColor, borderColor, textColor, iconColor, icon } = this.getTypeStyles(type);
        
        toast.className = `max-w-xs ${bgColor} ${borderColor} rounded-xl shadow-lg opacity-0 translate-x-full transition-all duration-300 transform`;
        toast.setAttribute('role', 'alert');
        toast.setAttribute('tabindex', '-1');
        
        toast.innerHTML = `
            <div class="flex p-4">
                <div class="shrink-0">
                    <svg class="shrink-0 size-4 ${iconColor} mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        ${icon}
                    </svg>
                </div>
                <div class="ms-3">
                    <p class="text-sm ${textColor}">
                        ${message}
                    </p>
                </div>
                <div class="ms-auto">
                    <button type="button" class="toast-close inline-flex shrink-0 justify-center items-center size-5 rounded-lg ${textColor} opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        `;

        // Add close button functionality
        const closeBtn = toast.querySelector('.toast-close');
        closeBtn.addEventListener('click', () => this.dismiss(toast));

        return toast;
    }

    getTypeStyles(type) {
        const styles = {
            success: {
                bgColor: 'bg-green-600',
                borderColor: 'border-green-600',
                textColor: 'text-white',
                iconColor: 'text-white',
                icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>'
            },
            error: {
                bgColor: 'bg-red-600',
                borderColor: 'border-red-600',
                textColor: 'text-white',
                iconColor: 'text-white',
                icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>'
            },
            warning: {
                bgColor: 'bg-yellow-50 border border-yellow-200',
                borderColor: 'border-yellow-200',
                textColor: 'text-yellow-800',
                iconColor: 'text-yellow-600',
                icon: '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>'
            },
            info: {
                bgColor: 'bg-blue-50 border border-blue-200',
                borderColor: 'border-blue-200',
                textColor: 'text-blue-800',
                iconColor: 'text-blue-600',
                icon: '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>'
            }
        };
        return styles[type] || styles.info;
    }

    dismiss(toast) {
        toast.classList.add('opacity-0', 'translate-x-full');
        toast.classList.remove('opacity-100', 'translate-x-0');
        
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }

    // Static methods for easy access
    static success(message, duration) {
        return window.toast.show(message, 'success', duration);
    }

    static error(message, duration) {
        return window.toast.show(message, 'error', duration);
    }

    static warning(message, duration) {
        return window.toast.show(message, 'warning', duration);
    }

    static info(message, duration) {
        return window.toast.show(message, 'info', duration);
    }
}

// Initialize global toast instance
document.addEventListener('DOMContentLoaded', () => {
    window.toast = new ToastUtility();
});

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = ToastUtility;
}