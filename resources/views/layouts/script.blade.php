<script>
    // Dynamic Dropdown System
    class DropdownManager {
        constructor() {
            this.dropdowns = new Map();
            this.init();
        }

        init() {
            // Auto-detect dropdowns based on data attributes
            this.autoDetectDropdowns();
            
            // Global click handler to close all dropdowns
            document.addEventListener('click', (e) => {
                this.closeAllDropdowns(e);
            });
        }

        autoDetectDropdowns() {
            // Find all elements with data-dropdown-toggle attribute
            const toggles = document.querySelectorAll('[data-dropdown-toggle]');
            
            toggles.forEach(toggle => {
                const targetId = toggle.getAttribute('data-dropdown-toggle');
                const dropdown = document.getElementById(targetId);
                
                if (dropdown) {
                    this.registerDropdown(toggle.id, targetId);
                }
            });
        }

        registerDropdown(toggleId, dropdownId) {
            const toggle = document.getElementById(toggleId);
            const dropdown = document.getElementById(dropdownId);

            if (!toggle || !dropdown) return;

            // Store dropdown reference
            this.dropdowns.set(toggleId, {
                toggle,
                dropdown,
                dropdownId,
                isOpen: false
            });

            // Add click event to toggle
            toggle.addEventListener('click', (e) => {
                e.stopPropagation();
                this.toggleDropdown(toggleId);
            });

            // Prevent dropdown from closing when clicking inside
            dropdown.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }

        toggleDropdown(toggleId) {
            const dropdownData = this.dropdowns.get(toggleId);
            if (!dropdownData) return;

            const { dropdown } = dropdownData;
            const isCurrentlyOpen = !dropdown.classList.contains('hidden');

            // Close all other dropdowns first
            this.closeAllDropdowns();

            // Toggle current dropdown
            if (!isCurrentlyOpen) {
                dropdown.classList.remove('hidden');
                dropdownData.isOpen = true;
            }
        }

        closeAllDropdowns(event = null) {
            this.dropdowns.forEach((dropdownData) => {
                const { dropdown } = dropdownData;
                dropdown.classList.add('hidden');
                dropdownData.isOpen = false;
            });
        }

        addDropdown(toggleId, dropdownId) {
            this.registerDropdown(toggleId, dropdownId);
        }
    }

    // Sidebar functionality
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebarClose = document.getElementById('sidebar-close');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const mainContent = document.getElementById('main-content');
    const mobileLogo = document.getElementById('mobile-logo');
    const desktopNavbarToggle = document.getElementById('desktop-navbar-toggle');
    const toggleText = document.getElementById('toggle-text');
    const logoToggle = document.getElementById('logo-toggle');

    let sidebarOpen = false;
    let sidebarCollapsed = false;

    function toggleMobileSidebar() {
        sidebarOpen = !sidebarOpen;
        
        if (sidebarOpen) {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            sidebarOverlay.classList.remove('hidden');
            mobileLogo.classList.add('hidden');
        } else {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            sidebarOverlay.classList.add('hidden');
            mobileLogo.classList.remove('hidden');
        }
    }

    function toggleDesktopSidebar() {
        sidebarCollapsed = !sidebarCollapsed;
        console.log('Desktop sidebar toggle:', sidebarCollapsed);
        
        if (sidebarCollapsed) {
            sidebar.style.transform = 'translateX(-100%)';
            sidebar.setAttribute('data-collapsed', 'true');
            mainContent.style.marginLeft = '0';
            if (desktopNavbarToggle) {
                desktopNavbarToggle.classList.remove('hidden');
                desktopNavbarToggle.classList.add('lg:block');
            }
            if (toggleText) toggleText.textContent = 'Expand';
        } else {
            sidebar.style.transform = 'translateX(0)';
            sidebar.setAttribute('data-collapsed', 'false');
            if (window.innerWidth >= 1024) {
                mainContent.style.marginLeft = '16rem';
            }
            if (desktopNavbarToggle) {
                desktopNavbarToggle.classList.add('hidden');
                desktopNavbarToggle.classList.remove('lg:block');
            }
            if (toggleText) toggleText.textContent = 'Collapse';
        }
    }

    function handleLogoClick() {
        if (window.innerWidth >= 1024) {
            console.log('Logo clicked on desktop');
            toggleDesktopSidebar();
        }
    }

    // Event listeners
    if (sidebarToggle) sidebarToggle.addEventListener('click', toggleMobileSidebar);
    if (sidebarClose) sidebarClose.addEventListener('click', toggleMobileSidebar);
    if (sidebarOverlay) sidebarOverlay.addEventListener('click', toggleMobileSidebar);
    if (desktopNavbarToggle) desktopNavbarToggle.addEventListener('click', toggleDesktopSidebar);
    if (logoToggle) logoToggle.addEventListener('click', handleLogoClick);

    // Legacy dropdown toggles (untuk backward compatibility)
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetDropdown = document.getElementById(targetId);
            const arrow = this.querySelector('.dropdown-arrow');
            
            if (targetDropdown) {
                targetDropdown.classList.toggle('hidden');
                if (arrow) arrow.classList.toggle('rotate-180');
            }
        });
    });

    // Resize handler
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
            sidebarOverlay.classList.add('hidden');
            mobileLogo.classList.add('hidden');
            sidebarOpen = false;
            if (sidebarCollapsed) {
                sidebar.style.transform = 'translateX(-100%)';
                mainContent.style.marginLeft = '0';
                if (desktopNavbarToggle) {
                    desktopNavbarToggle.classList.remove('hidden');
                    desktopNavbarToggle.classList.add('lg:block');
                }
            } else {
                sidebar.style.transform = 'translateX(0)';
                mainContent.style.marginLeft = '16rem';
                if (desktopNavbarToggle) {
                    desktopNavbarToggle.classList.add('hidden');
                    desktopNavbarToggle.classList.remove('lg:block');
                }
            }
        } else {
            sidebar.style.transform = '';
            mainContent.style.marginLeft = '';

            if (desktopNavbarToggle) {
                desktopNavbarToggle.classList.add('hidden');
                desktopNavbarToggle.classList.remove('lg:block');
            }
            
            if (!sidebarOpen) {
                mobileLogo.classList.remove('hidden');
                sidebar.classList.add('-translate-x-full');
            } else {
                sidebar.classList.remove('-translate-x-full');
            }
        }
    });

    // Load handler
    window.addEventListener('load', function() {
        // Initialize dropdown manager
        const dropdownManager = new DropdownManager();
        window.dropdownManager = dropdownManager;

        if (window.innerWidth < 1024) {
            mobileLogo.classList.remove('hidden');
            if (desktopNavbarToggle) {
                desktopNavbarToggle.classList.add('hidden');
            }
        } else {
            if (!sidebarCollapsed) {
                mainContent.style.marginLeft = '16rem';
                sidebar.style.transform = 'translateX(0)';
                if (desktopNavbarToggle) {
                    desktopNavbarToggle.classList.add('hidden');
                }
            }
        }
    });
    

    function switchLanguage(locale) {
        if (!['en', 'id'].includes(locale)) {
            console.error('Invalid locale:', locale);
            return;
        }
        const langOption = document.querySelector(`[data-lang="${locale}"]`);
        if (langOption) {
            const allOptions = document.querySelectorAll('.language-option');
            allOptions.forEach(option => {
                option.classList.add('opacity-50', 'pointer-events-none');
            });
            const checkIcon = langOption.querySelector('[data-lucide="check"]');
            const spinner = langOption.querySelector('.loading-spinner');
            
            if (checkIcon) checkIcon.classList.add('hidden');
            if (spinner) spinner.classList.remove('hidden');
        }

        if (window.dropdownManager) {
            window.dropdownManager.closeAllDropdowns();
        }
        window.location.href = "/lang/" + locale;
    }
</script>