<!-- Header -->
<header class="sticky top-0 z-50 lg:z-30 w-full bg-white border-b border-gray-200 shadow-sm">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Left side -->
            <div class="flex items-center gap-3">
                <!-- Mobile/Tablet sidebar toggle -->
                <button
                    id="sidebar-toggle"
                    class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 lg:hidden"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Desktop sidebar toggle - only visible when sidebar is collapsed -->
                <button
                    id="desktop-navbar-toggle"
                    class="hidden lg:block p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <!-- Logo - single instance, responsive sizing -->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 lg:w-10 lg:h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm lg:text-base">S</span>
                    </div>
                    <span class="font-bold text-lg lg:text-xl text-gray-900">SIAKAD</span>
                </div>
            </div>

            <!-- Right side -->
            <div class="flex items-center gap-3">
                <!-- Search - hidden on mobile -->
                <!-- Notification Dropdown -->
                @include('layouts.components.notifications')
                <!-- Language -->
                <div class="relative">
                    <button
                        id="language-toggle"
                        data-dropdown-toggle="language-dropdown"
                        class="flex items-center gap-1 p-1 hover:bg-blue-50 rounded-lg transition-all duration-200"
                    >
                        <i data-lucide="earth" class="h-5 w-5"></i>
                        <i data-lucide="chevron-down" class="h-4 w-4"></i>
                    </button>

                    <!-- Language Dropdown -->
                    <div id="language-dropdown" class="hidden fixed top-16 left-1/2 transform -translate-x-1/2 lg:left-auto lg:right-4 lg:transform-none mt-1 lg:w-80 w-80 max-w-[calc(100vw-2rem)] bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                        @php
                            $currentLocale = session('locale', config('app.locale', 'en'));
                            $languages = [
                                'en' => ['name' => 'English', 'flag' => '🇺🇸'],
                                'id' => ['name' => 'Bahasa Indonesia', 'flag' => '🇮🇩'],
                            ];
                        @endphp
                        <div class="p-2 border-b border-gray-100">
                            <p class="text-xs text-gray-500 px-3 py-2 font-medium uppercase tracking-wide">{{ __('dashboard::messages.navbar.dropdown.language.list.available') }}</p>
                            
                            <!-- English Option -->
                            <a href="javascript:void(0)" 
                            onclick="switchLanguage('en')" 
                            class="language-option flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-all duration-200 {{ $currentLocale === 'en' ? 'bg-blue-50 text-blue-600' : '' }}"
                            data-lang="en">
                                <span class="w-4 h-4 flex items-center justify-center text-xs font-medium">🇺🇸</span>
                                <span>English</span>
                                @if($currentLocale === 'en')
                                    <i data-lucide="check" class="h-4 w-4 ml-auto text-blue-600"></i>
                                @endif
                                <div class="loading-spinner hidden ml-auto w-4 h-4 border-2 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
                            </a>
                            
                            <!-- Indonesian Option -->
                            <a href="javascript:void(0)" 
                            onclick="switchLanguage('id')" 
                            class="language-option flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-all duration-200 {{ $currentLocale === 'id' ? 'bg-blue-50 text-blue-600' : '' }}"
                            data-lang="id">
                                <span class="w-4 h-4 flex items-center justify-center text-xs font-medium">🇮🇩</span>
                                <span>Bahasa Indonesia</span>
                                @if($currentLocale === 'id')
                                    <i data-lucide="check" class="h-4 w-4 ml-auto text-blue-600"></i>
                                @endif
                                <div class="loading-spinner hidden ml-auto w-4 h-4 border-2 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Language -->
                

                <!-- Switch role -->
                <div class="relative">
                    <button
                        id="switch-role-toggle"
                        data-dropdown-toggle="switch-role-dropdown"
                        class="flex items-center gap-1 p-1 hover:bg-blue-50 rounded-lg transition-all duration-200"
                    >
                        <i data-lucide="switch-camera" class="h-5 w-5"></i>
                        <i data-lucide="chevron-down" class="h-4 w-4"></i>
                    </button>

                    <!-- Switch role Dropdown -->
                    <div id="switch-role-dropdown" class="hidden fixed top-16 left-4 right-4 mx-auto mt-1 lg:left-auto lg:right-4 lg:mx-0 w-80 max-w-[calc(100vw-2rem)] bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                        <div class="p-4 border-b border-gray-100">
                            <p class="text-sm text-gray-500">{{ __('dashboard::messages.navbar.dropdown.switch-role.current') }}</p>
                            <p class="font-medium text-gray-900">Administrator</p>
                        </div>
                        <div class="p-2 border-b border-gray-100">
                            <p class="text-xs text-gray-500 px-3 py-2 font-medium uppercase tracking-wide">{{ __('dashboard::messages.navbar.dropdown.switch-role.list.available') }}</p>
                            <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                Teacher
                            </a>
                            <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                                Student
                            </a>
                            <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Staff
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Profile -->
                <div class="relative">
                    <button
                        id="profile-toggle"
                        data-dropdown-toggle="profile-dropdown"
                        class="flex items-center gap-2 p-1 hover:bg-blue-50 rounded-lg transition-all duration-200"
                    >
                        <img
                            src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&auto=format&fit=facearea&facepad=2&w=32&h=32&q=80"
                            alt="Avatar"
                            class="w-8 h-8 rounded-full"
                        />
                        <i data-lucide="chevron-down" class="h-5 w-5"></i>
                    </button>

                    <!-- Profile Dropdown -->
                    <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                        <div class="p-4 border-b border-gray-100">
                            <p class="text-sm text-gray-500">{{ __('dashboard::messages.navbar.dropdown.profile.label') }}</p>
                            <p class="font-medium text-gray-900">james@site.com</p>
                        </div>
                        <div class="p-2 border-b border-gray-100">
                            <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </a>
                        </div>
                        <div class="p-2">
                            <a href="javascript:void(0)" id="logout-btn" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-md transition-all duration-200">
                                <i data-lucide="log-out" class="h-5 w-5"></i>
                                {{ __('dashboard::messages.navbar.dropdown.profile.list.logout') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="announcement-banner" class="hs-removing:-translate-y-full bg-blue-600 transition-all duration-300 ease-in-out lg:ml-64">
  <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex">
      <p class="text-white">
        Alert system. Other notification <a class="decoration-2 underline font-medium hover:text-white/80 focus:outline-hidden focus:text-white/80" href="../figma.html">Learn more</a>
      </p>

      <div class="ps-3 ms-auto">
        <button type="button" class="inline-flex rounded-lg p-1.5 text-white hover:bg-white focus:outline-hidden focus:bg-white/10" data-hs-remove-element="#ab-full-width-with-dismiss-button-on-blue-bg" onclick="closeBanner()">
          <i data-lucide="x" class="h-5 w-5"></i>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- End Announcement Banner -->

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const logoutBtn = document.getElementById('logout-btn');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const announcementBanner = document.getElementById('ab-full-width-with-dismiss-button-on-blue-bg');

            // Function to update banner margin based on sidebar state
            function updateBannerMargin() {
                const sidebar = document.getElementById('sidebar');
                if (sidebar && announcementBanner) {
                    const isCollapsed = sidebar.getAttribute('data-collapsed') === 'true';
                    const isDesktop = window.innerWidth >= 1024;
                    
                    if (isDesktop) {
                        if (isCollapsed) {
                            announcementBanner.style.marginLeft = '0';
                        } else {
                            announcementBanner.style.marginLeft = '16rem';
                        }
                    } else {
                        announcementBanner.style.marginLeft = '0';
                    }
                }
            }

            // Listen for sidebar toggle events
            const logoToggle = document.getElementById('logo-toggle');
            const desktopNavbarToggle = document.getElementById('desktop-navbar-toggle');
            
            if (logoToggle) {
                logoToggle.addEventListener('click', () => {
                    if (window.innerWidth >= 1024) {
                        setTimeout(updateBannerMargin, 50); // Small delay to ensure sidebar state is updated
                    }
                });
            }
            
            if (desktopNavbarToggle) {
                desktopNavbarToggle.addEventListener('click', () => {
                    setTimeout(updateBannerMargin, 50);
                });
            }

            // Listen for window resize
            window.addEventListener('resize', updateBannerMargin);

            // Initial setup
            updateBannerMargin();

            logoutBtn.addEventListener('click', async (e) => {
                e.preventDefault();
                try {
                    const res = await fetch("{{ route('authentication.logout') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({})
                    });

                    const data = await res.json();
                    if (data.success) {
                        if (data.show_toast) {
                            sessionStorage.setItem('toast_data', JSON.stringify({
                                message: data.message,
                                type: data.toast_type || 'success'
                            }));
                        }
                        
                        window.location.href = data.redirect;
                    } else {
                        alert('Logout gagal');
                    }
                } catch (err) {
                    console.error(err);
                    alert('Logout gagal');
                }
            });
        });
        function closeBanner() {
            const banner = document.getElementById('announcement-banner');
            banner.style.transform = 'translateY(-100%)';
            setTimeout(() => {
                banner.style.display = 'none';
            }, 300);
        }
    </script>
@endpush