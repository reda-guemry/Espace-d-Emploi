<x-guest-layout>
    <div class="min-h-screen bg-black flex flex-col justify-center items-center relative overflow-hidden selection:bg-red-500 selection:text-white">
        
        {{-- 1. Atmospheric Background (Nafs lkhalfiya dyal Register) --}}
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none z-0">
            <div class="absolute top-[-10%] left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-red-900/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-10%] left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-red-950/20 rounded-full blur-[100px]"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 brightness-100 contrast-150"></div>
        </div>

        <div class="relative z-10 w-full max-w-md px-6">
            
            {{-- Header --}}
            <div class="text-center mb-10">
                <a href="/" class="inline-block mb-6 group cursor-pointer">
                    <span class="text-3xl font-bold text-white tracking-tighter">
                        Job<span class="text-red-600">Match</span>
                    </span>
                </a>
                <h2 class="text-2xl font-semibold text-white">Welcome Back</h2>
                <p class="text-zinc-600 mt-2 text-sm">Please sign in to your account</p>
            </div>

            {{-- Card Form --}}
            <div class="bg-black/80 backdrop-blur-xl border border-zinc-900 rounded-3xl p-8 shadow-2xl relative overflow-hidden">
                
                {{-- Top Red Line Accent --}}
                <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-red-900/50 to-transparent"></div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-zinc-500 text-xs uppercase font-bold tracking-wider mb-2" />
                        {{-- Input Style: bg-zinc-200 & text-black --}}
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                            class="w-full rounded-xl bg-zinc-200 border border-zinc-800 text-black px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 placeholder-zinc-500 transition-all outline-none hover:bg-zinc-100"
                            placeholder="john@example.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-zinc-500 text-xs uppercase font-bold tracking-wider mb-2" />
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full rounded-xl bg-zinc-200 border border-zinc-800 text-black px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 placeholder-zinc-500 transition-all outline-none hover:bg-zinc-100"
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" class="rounded border-zinc-800 text-red-600 shadow-sm focus:ring-red-600 focus:ring-offset-black bg-zinc-900" name="remember">
                            <span class="ml-2 text-sm text-zinc-500 group-hover:text-zinc-400 transition">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-zinc-500 hover:text-red-500 font-medium transition-colors" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full group relative flex justify-center py-2 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-red-600 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-red-700 transition-all duration-300 shadow-[0_5px_20px_rgba(185,28,28,0.2)] hover:shadow-[0_5px_30px_rgba(185,28,28,0.4)]">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-red-300 group-hover:text-red-200 transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            {{ __('Sign In') }}
                        </button>
                    </div>

                    <div class="text-center pt-2">
                        <p class="text-sm text-zinc-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-medium text-zinc-400 hover:text-red-500 transition-colors underline decoration-zinc-800 underline-offset-4 hover:decoration-red-500">
                                Create one
                            </a>
                        </p>
                    </div>
                </form>
            </div>
            
             <div class="mt-8 text-center text-xs text-zinc-700">
                <span class="mx-2">&copy; {{ date('Y') }} JobMatch. All rights reserved.</span>
            </div>
        </div>
    </div>
</x-guest-layout>