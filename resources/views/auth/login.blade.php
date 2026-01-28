<x-guest-layout>
    <div class="min-h-screen bg-slate-950 flex flex-col justify-center items-center relative overflow-hidden px-4 sm:px-6 py-10">
        
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-3xl h-full bg-blue-600/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-600/10 rounded-full blur-[100px]"></div>
        </div>

        <div class="relative w-full max-w-md">
            
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 shadow-lg shadow-blue-500/30 mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <h2 class="text-3xl font-bold text-white tracking-tight">Welcome Back</h2>
                <p class="text-slate-400 mt-2 text-sm">Please sign in to your account</p>
            </div>

            <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl p-8 relative overflow-hidden backdrop-blur-sm">
                
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-600"></div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-slate-300 text-xs uppercase font-bold tracking-wider mb-1" />
                        <x-text-input id="email" 
                                      class="block w-full bg-slate-950 border-slate-800 text-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg py-3 text-sm" 
                                      type="email" 
                                      name="email" 
                                      :value="old('email')" 
                                      required autofocus autocomplete="username" 
                                      placeholder="name@example.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-slate-300 text-xs uppercase font-bold tracking-wider mb-1" />
                        <x-text-input id="password" 
                                      class="block w-full bg-slate-950 border-slate-800 text-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg py-3 text-sm" 
                                      type="password" 
                                      name="password" 
                                      required autocomplete="current-password" 
                                      placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded bg-slate-950 border-slate-700 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-offset-slate-900" name="remember">
                            <span class="ml-2 text-sm text-slate-400 hover:text-slate-300 transition">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-400 hover:text-blue-300 font-medium transition-colors" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="pt-2">
                        <x-primary-button class="w-full justify-center py-3 text-sm font-bold tracking-wide uppercase bg-blue-600 hover:bg-blue-500 border-none shadow-lg shadow-blue-900/40 transition-all transform hover:-translate-y-0.5">
                            {{ __('Sign In') }}
                        </x-primary-button>
                    </div>

                    <div class="text-center pt-2">
                        <p class="text-sm text-slate-400">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-bold transition-colors">
                                Create one
                            </a>
                        </p>
                    </div>
                </form>
            </div>
            
             <div class="mt-8 text-center text-xs text-slate-600">
                <span class="mx-2">&copy; {{ date('Y') }} Talentia</span>
            </div>
        </div>
    </div>
</x-guest-layout>