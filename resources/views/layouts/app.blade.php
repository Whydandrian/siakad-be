<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    
    {{-- navbar --}}
    @include('layouts.navbar')

    {{-- left sidebar --}}
    @include('layouts.left-sidebar')

    <!-- Overlay for mobile -->
    <div id="sidebar-overlay" class="hidden fixed inset-0 z-30 bg-black bg-opacity-50 lg:hidden"></div>

    <!-- Main Content -->
    <main id="main-content" class="transition-all duration-300 ease-in-out lg:ml-64">
        <div class="p-4 sm:p-6 lg:p-8 space-y-6">
            @include('layouts.breadcumbs')

            @yield('content')

        </div>
    </main>

    @include('layouts.script')
    @stack('js')
</body>
</html>