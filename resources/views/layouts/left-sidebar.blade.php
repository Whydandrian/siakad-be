<!-- Sidebar -->
<div id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-gray-200 transform transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0" data-collapsed="false">
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="flex items-center gap-3 p-6 border-b border-gray-200">
            <button 
                id="logo-toggle"
                class="flex items-center gap-3 hover:bg-gray-50 rounded-lg p-2 -m-2 transition-all duration-200 lg:cursor-pointer"
            >
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold">S</span>
                </div>
                <span class="font-bold text-xl text-gray-900">SIAKAD</span>
            </button>
            <button
                id="sidebar-close"
                class="ml-auto p-1 text-gray-500 hover:text-gray-700 lg:hidden"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <!-- Dashboard -->
            <a
                href="#"
                class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg transition-all duration-200"
            >
                <i data-lucide="layout-dashboard" class="h-4 w-4"></i>
                {{ __('dashboard::messages.left-sidebar.dashboard') }}
            </a>

            <!-- Users -->
            <div class="space-y-1">
                <button
                    class="dropdown-toggle w-full flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200"
                    data-target="users-dropdown"
                >
                    <i data-lucide="users" class="h-4 w-4 "></i>
                    {{ __('dashboard::messages.left-sidebar.user') }}
                    <svg class="w-4 h-4 ml-auto transform transition-transform duration-200 dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <div id="users-dropdown" class="hidden ml-6 space-y-1">
                    <button
                        class="dropdown-toggle w-full flex items-center gap-3 px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-all duration-200"
                        data-target="users-sub1-dropdown"
                    >
                        Sub Menu 1
                        <svg class="w-4 h-4 ml-auto transform transition-transform duration-200 dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div id="users-sub1-dropdown" class="hidden ml-4 space-y-1">
                        <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-all duration-200">
                            Link 1
                        </a>
                        <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-all duration-200">
                            Link 2
                        </a>
                        <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-all duration-200">
                            Link 3
                        </a>
                    </div>

                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-all duration-200">
                        Sub Menu 2
                    </a>
                </div>
            </div>

            <a
                href="#"
                class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200"
            >
                <i data-lucide="book-open" class="h-4 w-4 "></i>
                {{ __('dashboard::messages.left-sidebar.documentation') }}
            </a>
        </nav>

    </div>
</div>