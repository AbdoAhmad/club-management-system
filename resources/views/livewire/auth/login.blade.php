    <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Logo / Brand -->
            <div class="text-center mb-10 card-container" style="animation-delay: 0s;">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Football Club</h1>
                <p class="text-gray-300 text-sm">Professional Management System</p>
            </div>

            <!-- Glass Card Form -->
            <div class="glass-card p-8 card-container" style="animation-delay: 0.1s;">
                <h2 class="text-2xl font-bold text-white mb-8 text-center">Welcome Back</h2>

                <form id="loginForm" class="space-y-4">
                    <!-- Email Input -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-200 mb-2">Email Address</label>
                        <input 
                        wire:model="email"
                            type="email" 
                            class="w-full input-field" 
                            placeholder="you@example.com"
                            required
                        >
                    </div>
                    @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <!-- Password Input -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-200 mb-2">Password</label>
                        <input 
                        wire:model="password"
                            type="password" 
                            class="w-full input-field" 
                            placeholder="••••••••"
                            required
                        >
                    </div>
                    @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror



                    <!-- Remember Me & Forgot -->
                    <div class="flex items-center justify-between my-6 text-sm">
                        <label class="flex items-center cursor-pointer">
                            <input wire:model="remember" type="checkbox" class="w-4 h-4 accent-green-500 cursor-pointer">
                            <span class="ml-2 text-gray-300">Remember me</span>
                        </label>
                        <a href="#" class="text-link">Forgot password?</a>
                    </div>

                    <!-- Login Button -->
                    <div class="btn-container">
                        <button wire:click="login" type="submit" class="w-full btn-primary">Sign In</button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-600"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-opacity-0 text-gray-400">Or continue with</span>
                    </div>
                </div>

                <!-- Social Login -->
                <div class="grid grid-cols-3 gap-3 btn-container" style="animation-delay: 0.45s;">
                    <button type="button" class="btn-social flex justify-center items-center h-12">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 12h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z"/>
                        </svg>
                    </button>
                    <button type="button" class="btn-social flex justify-center items-center h-12">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </button>
                    <button type="button" class="btn-social flex justify-center items-center h-12">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 002.856-3.915 10.019 10.019 0 01-2.836.856 4.958 4.958 0 002.165-2.724c-.951.564-2.005.974-3.127 1.195a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </button>
                </div>

                <!-- Sign Up Link -->
                <p class="text-center text-gray-300 text-sm mt-8" style="animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) 0.5s both;">
                    Don't have an account? 
                    <a href="register.html" class="text-link">Create one now</a>
                </p>
            </div>

            <!-- Footer Note -->
            <p class="text-center text-gray-500 text-xs mt-8 px-4">
                By signing in, you agree to our Terms of Service and Privacy Policy
            </p>
        </div>
    </div>