<html lang="en">
<head>
    @include('authentication::components.head')
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">

    @include('authentication::components.background')

    <!-- Main Content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-md">
            <!-- Glassmorphism Card -->
            <div class="bg-white border border-white/30 rounded-3xl shadow-2xl p-8 relative overflow-hidden">
                <!-- Card Background Gradient -->
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-white/5 rounded-3xl"></div>
                
                <!-- Content -->
                <div class="relative z-10">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-500/20 backdrop-blur-sm rounded-2xl border border-blue-300/30 mb-4">
                            <img src="{{asset('logo.png')}}" alt="logo" class="w-12 h-12">
                        </div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent mb-2">
                            SIAKAD
                        </h1>
                    </div>
                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300/30"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white/20 backdrop-blur-sm text-gray-500 rounded-full">
                                Login
                            </span>
                        </div>
                    </div>

                    <!-- Login Form -->
                    <form id="loginForm" action="{{ route('authentication.process') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('POST')

                        <!-- Username Field -->
                        <div>
                            @if($errors->any())
                            <div class="bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert" tabindex="-1" aria-labelledby="hs-with-list-label">
                                <div class="flex">
                                    <div class="shrink-0">
                                    <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m15 9-6 6"></path>
                                        <path d="m9 9 6 6"></path>
                                    </svg>
                                    </div>
                                    <div class="ms-4">
                                    <h3 id="hs-with-list-label" class="text-sm font-semibold">
                                        Terjadi kesalahan:
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700 dark:text-red-400">
                                        <ul class="list-disc space-y-1 ps-5">
                                            @foreach($errors->all() as $error)
                                            <li>• {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            @endif
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('authentication::messages.form.username') }}
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none z-10">
                                    <i data-lucide="id-card-lanyard" class="h-5 w-5 @error('username') text-red-400 @else text-gray-400 @enderror" id="username-icon"></i>
                                </div>
                                <input type="text" id="username" name="username" required 
                                    class="block w-full pl-10 @error('username') pr-10 border-red-500 focus:border-red-500 focus:ring-red-500 @else pr-3 border-gray-300 focus:border-blue-500 focus:ring-blue-500/50 @enderror py-3 bg-white/50 backdrop-blur-sm border-2 rounded-xl placeholder-gray-500 focus:outline-none focus:ring-2 transition-all duration-200" 
                                    placeholder="Masukkan Username" 
                                    value="{{ old('username') }}">
                                @error('username')
                                    <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                        <svg class="shrink-0 h-4 w-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" x2="12" y1="8" y2="12"></line>
                                            <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                        </svg>
                                    </div>
                                @enderror
                            </div>
                            @error('username')
                                <p class="text-sm text-red-600 mt-2" id="username-error-helper">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    {{ __('authentication::messages.form.password') }}
                                </label>
                                <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                                    Forgot password?
                                </a>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none z-10">
                                    <i data-lucide="key-square" class="h-5 w-5 @error('password') text-red-400 @else text-gray-400 @enderror" id="password-icon"></i>
                                </div>
                                <input type="password" id="password" name="password" required 
                                    class="block w-full pl-10 @error('password') pr-12 border-red-500 focus:border-red-500 focus:ring-red-500 @else pr-10 border-gray-300 focus:border-blue-500 focus:ring-blue-500/50 @enderror py-3 bg-white/50 backdrop-blur-sm border-2 rounded-xl placeholder-gray-500 focus:outline-none focus:ring-2 transition-all duration-200" 
                                    placeholder="Masukkan Password">
                                @error('password')
                                    <div class="absolute inset-y-0 right-10 flex items-center pointer-events-none pr-1">
                                        <svg class="shrink-0 h-4 w-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" x2="12" y1="8" y2="12"></line>
                                            <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                        </svg>
                                    </div>
                                @enderror
                                <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200 z-10">
                                    <i data-lucide="eye" class="h-5 w-5" id="password-toggle"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-sm text-red-600 mt-2" id="password-error-helper">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input id="rememberMe" name="rememberMe" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-colors duration-200">
                            <label for="rememberMe" class="ml-2 block text-sm text-gray-700">
                                {{ __('authentication::messages.form.remember_me') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:ring-offset-2 focus:ring-offset-transparent transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                            {{ __('authentication::messages.buttons.login.label') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('authentication::components.script')
</body>
</html>