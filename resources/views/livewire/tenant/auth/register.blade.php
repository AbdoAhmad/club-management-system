    <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-12">
        <style>
            /* Custom Select Option Styling */
            .input-field option {
                background-color: #0f172a;
                color: #e2e8f0;
                padding: 12px;
            }

            /* Avatar Circle Styling */
            .avatar-container {
                position: relative;
                width: 100px;
                height: 100px;
                margin: 0 auto 24px;
                animation: zoomIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            .avatar-circle {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                border: 2px dashed rgba(34, 197, 94, 0.4);
                background: rgba(255, 255, 255, 0.05);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                overflow: hidden;
                transition: all 0.3s ease;
                position: relative;
            }

            .avatar-circle:hover {
                border-color: #22c55e;
                background: rgba(34, 197, 94, 0.08);
                transform: scale(1.02);
            }

            .avatar-circle i, .avatar-circle svg {
                color: rgba(34, 197, 94, 0.8);
                margin-bottom: 4px;
            }

            .avatar-circle span {
                font-size: 10px;
                color: #94a3b8;
                font-weight: 500;
            }

            .avatar-preview-img {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }

            @keyframes zoomIn {
                from { opacity: 0; transform: scale(0.5); }
                to { opacity: 1; transform: scale(1); }
            }

            /* Custom Scrollbar */
            .custom-scrollbar::-webkit-scrollbar {
                width: 5px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: rgba(255, 255, 255, 0.05);
                border-radius: 10px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: rgba(34, 197, 94, 0.3);
                border-radius: 10px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: rgba(34, 197, 94, 0.5);
            }
        </style>

        <div class="w-full max-w-md">
            <!-- Logo / Brand -->
            <div class="text-center mb-8 card-container" style="animation-delay: 0s;">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Football Club</h1>
                <p class="text-gray-300 text-sm">Join the Management Team</p>
            </div>

            <!-- Glass Card Form -->
            <div class="glass-card p-8 card-container" style="animation-delay: 0.1s; max-height: 92vh; display: flex; flex-direction: column;">
                <h2 class="text-2xl font-bold text-white mb-6 text-center flex-shrink-0">Create Account</h2>

                <form wire:submit.prevent="register" id="registerForm" class="flex flex-col overflow-hidden flex-1">
                    <!-- Fixed Avatar Area -->
                    <div class="avatar-container flex-shrink-0">
                        <label for="avatar-input" class="avatar-circle">

                            @if($avatar)
                                <img class="avatar-preview-img" src="{{ $avatar->temporaryUrl() }}" alt="Preview">
                            @else
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Add Photo</span>
                            @endif

                        </label>

                        <input wire:model="avatar" type="file" id="avatar-input"
                            class="hidden" accept="image/*">
                    </div>
                    <!-- Scrollable Fields Area -->
                    <div class="flex-1 overflow-y-auto pr-2 space-y-4 custom-scrollbar">
                        <!-- Full Name Input -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-200 mb-2">Full Name</label>
                            <input 
                                wire:model="name"
                                type="text" 
                                class="input-field" 
                                placeholder="John Doe"
                                required
                            >
                        </div>

                        <!-- Email Input -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-200 mb-2">Email Address</label>
                            <input 
                                wire:model="email"
                                type="email" 
                                class="input-field" 
                                placeholder="you@example.com"
                                required
                            >
                        </div>

                        <!-- Club Position -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-200 mb-2">Club Position</label>
                            <div class="relative">
                                <select wire:model="role" class="input-field appearance-none cursor-pointer">
                                    <option value="" disabled selected>Select your role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-200 mb-2">Password</label>
                            <input 
                                wire:model="password"
                                type="password" 
                                id="passwordInput"
                                class="input-field" 
                                placeholder="••••••••"
                                required
                            >
                            <div class="strength-bar">
                                <div class="strength-bar-fill" id="strengthBar"></div>
                            </div>
                            <p class="text-xs text-gray-400 mt-2">At least 8 characters, mix of uppercase, lowercase, and numbers</p>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-200 mb-2">Confirm Password</label>
                            <input 
                                wire:model="password_confirmation"
                                type="password" 
                                id="confirmPassword"
                                class="input-field" 
                                placeholder="••••••••"
                                required
                            >
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="form-group pt-2">
                            <label class="flex items-start cursor-pointer">
                                <input type="checkbox" wire:model="terms" class="checkbox-input mt-1" required>
                                <span class="ml-3 text-sm text-gray-300">
                                    I agree to the 
                                    <a href="#" class="text-link">Terms of Service</a> and 
                                    <a href="#" class="text-link">Privacy Policy</a>
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Fixed Bottom Area -->
                    <div class="flex-shrink-0 mt-6 space-y-4">
                        <button type="submit" class="btn-primary w-full">Create Account</button>
                        <p class="text-center text-gray-300 text-sm">
                            Already have an account? 
                            <a href="{{ route('tenant.login') }}" class="text-link">Sign in here</a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Footer Note -->
            <p class="text-center text-gray-500 text-xs mt-6 px-4">
                Need help? Contact our support team
            </p>
        </div>
    </div>

