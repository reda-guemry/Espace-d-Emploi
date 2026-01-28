<x-guest-layout>
    <div class="min-h-screen bg-slate-950 relative overflow-hidden flex items-center justify-center p-4">
        <!-- Animated Background Gradient -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-950 via-slate-950 to-slate-900"></div>
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-1/2 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>

        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-[size:4rem_4rem] opacity-20"></div>

        <div class="relative w-full max-w-7xl mx-auto grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            
            <!-- Left Side - Branding -->
            <div class="hidden lg:flex flex-col space-y-8 pr-8">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/50">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h1 class="text-4xl font-bold text-white">Talentia</h1>
                    </div>
                    <h2 class="text-5xl font-bold text-white leading-tight mb-4">
                        Your Career Journey<br />
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Starts Here</span>
                    </h2>
                    <p class="text-lg text-slate-400 leading-relaxed">
                        Join thousands of professionals connecting with top companies worldwide. Your next opportunity awaits.
                    </p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center space-x-4 group cursor-default">
                        <div class="w-14 h-14 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center group-hover:bg-blue-500/20 transition-all duration-300">
                            <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg mb-1">Verified Companies</h3>
                            <p class="text-slate-400 text-sm">Connect with trusted employers only</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 group cursor-default">
                        <div class="w-14 h-14 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center group-hover:bg-blue-500/20 transition-all duration-300">
                            <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg mb-1">Instant Matching</h3>
                            <p class="text-slate-400 text-sm">AI-powered job recommendations</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 group cursor-default">
                        <div class="w-14 h-14 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center group-hover:bg-blue-500/20 transition-all duration-300">
                            <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg mb-1">Secure & Private</h3>
                            <p class="text-slate-400 text-sm">Your data is protected and encrypted</p>
                        </div>
                    </div>
                </div>

                <div class="pt-8">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white mb-1">50K+</div>
                            <div class="text-xs text-slate-400 uppercase tracking-wider">Users</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white mb-1">10K+</div>
                            <div class="text-xs text-slate-400 uppercase tracking-wider">Companies</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white mb-1">95%</div>
                            <div class="text-xs text-slate-400 uppercase tracking-wider">Success</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="w-full max-w-xl mx-auto lg:mx-0">
                <!-- Mobile Logo -->
                <div class="lg:hidden flex items-center justify-center space-x-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-white">Talentia</h1>
                </div>

                <!-- Form Card -->
                <div class="bg-slate-900/50 backdrop-blur-xl rounded-3xl border border-slate-800/50 shadow-2xl p-8 md:p-10">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-white mb-2">Create Account</h2>
                        <p class="text-slate-400">Join our community today</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Name Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- First Name -->
                            <div>
                                <x-input-label for="first_name" :value="__('First Name')" class="text-slate-300 text-sm font-medium mb-2" />
                                <x-text-input 
                                    id="first_name" 
                                    class="block w-full bg-slate-800/50 border border-slate-700/50 text-white placeholder-slate-500 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                    type="text" 
                                    name="first_name" 
                                    :value="old('first_name')" 
                                    required 
                                    autofocus 
                                    autocomplete="given-name"
                                    placeholder="John" />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>

                            <!-- Last Name -->
                            <div>
                                <x-input-label for="last_name" :value="__('Last Name')" class="text-slate-300 text-sm font-medium mb-2" />
                                <x-text-input 
                                    id="last_name" 
                                    class="block w-full bg-slate-800/50 border border-slate-700/50 text-white placeholder-slate-500 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                    type="text" 
                                    name="last_name" 
                                    :value="old('last_name')" 
                                    required 
                                    autocomplete="family-name"
                                    placeholder="Doe" />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('Email Address')" class="text-slate-300 text-sm font-medium mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <x-text-input 
                                    id="email" 
                                    class="block w-full bg-slate-800/50 border border-slate-700/50 text-white placeholder-slate-500 rounded-xl pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autocomplete="username"
                                    placeholder="john.doe@example.com" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Role Selection -->
                        <div>
                            <x-input-label for="role" :value="__('I am a')" class="text-slate-300 text-sm font-medium mb-2" />
                            <div class="relative">
                                <select 
                                    id="role" 
                                    name="role" 
                                    required
                                    class="block w-full bg-slate-800/50 border border-slate-700/50 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 appearance-none cursor-pointer">
                                    <option value="" disabled selected class="bg-slate-800 text-slate-500">Select your role</option>
                                    <option value="candidate" class="bg-slate-800 text-white">Candidate - Looking for opportunities</option>
                                    <option value="recruiter" class="bg-slate-800 text-white">Recruiter - Hiring talent</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Password Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Password -->
                            <div>
                                <x-input-label for="password" :value="__('Password')" class="text-slate-300 text-sm font-medium mb-2" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <x-text-input 
                                        id="password" 
                                        class="block w-full bg-slate-800/50 border border-slate-700/50 text-white placeholder-slate-500 rounded-xl pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        type="password"
                                        name="password"
                                        required 
                                        autocomplete="new-password"
                                        placeholder="••••••••" />
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-300 text-sm font-medium mb-2" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <x-text-input 
                                        id="password_confirmation" 
                                        class="block w-full bg-slate-800/50 border border-slate-700/50 text-white placeholder-slate-500 rounded-xl pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        type="password"
                                        name="password_confirmation" 
                                        required 
                                        autocomplete="new-password"
                                        placeholder="••••••••" />
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <x-primary-button class="w-full justify-center bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-600 text-white font-semibold py-3.5 px-6 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-slate-900 transition duration-300 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5">
                                {{ __('Create Account') }}
                            </x-primary-button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center pt-4 border-t border-slate-800/50">
                            <span class="text-slate-400 text-sm">Already have an account?</span>
                            <a class="text-blue-400 hover:text-blue-300 text-sm font-semibold ml-2 transition-colors duration-200" href="{{ route('login') }}">
                                {{ __('Sign in') }}
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="text-center mt-6">
                    <p class="text-slate-500 text-xs">
                        By signing up, you agree to our 
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Terms</a> 
                        and 
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Privacy Policy</a>
                    </p>
                </div>
            </div>
        </div>

        <style>
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            
            .animate-blob {
                animation: blob 7s infinite;
            }
            
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </div>
</x-guest-layout>