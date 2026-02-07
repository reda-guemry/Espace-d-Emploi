<x-guest-layout>
    {{-- Zedt ghamme9t l background l3am: bg-black bdel #050505 --}}
    <div class="min-h-screen bg-black flex flex-col justify-center items-center relative overflow-hidden selection:bg-red-500 selection:text-white">
        
        {{-- 1. Atmospheric Background (Darker & More Subtle) --}}
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none z-0">
            {{-- Na9ast mn l opacity dyal l7mer bach yban gham9 --}}
            <div class="absolute top-[-10%] left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-red-900/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-10%] left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-red-950/20 rounded-full blur-[100px]"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 brightness-100 contrast-150"></div>
        </div>

        {{-- 2. Main Container --}}
        <div class="relative z-10 w-full max-w-2xl px-6">
            
            {{-- Header --}}
            <div class="text-center mb-10">
                <a href="/" class="inline-flex items-center gap-3 mb-6 group cursor-pointer">
                    {{-- Logo M7iyed (Removed SVG container) --}}
                    
                    <span class="text-3xl font-bold text-white tracking-tighter">
                        Job<span class="text-red-600">Match</span>
                    </span>
                </a>
                <h1 class="text-2xl font-semibold text-white">Create your account</h1>
                <p class="text-zinc-600 mt-2 text-sm">Join the elite network of professionals.</p>
            </div>

            {{-- 3. Card Form --}}
            {{-- Ghamme9t l card: bg-black/80 --}}
            <div class="bg-black/80 backdrop-blur-xl border border-zinc-900 rounded-3xl p-8 sm:p-10 shadow-2xl relative overflow-hidden">
                
                {{-- Top Red Line Accent --}}
                <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-red-900/50 to-transparent"></div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-zinc-500 uppercase tracking-wider mb-3">I am joining as a...</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="role" value="candidate" class="peer sr-only" checked>
                                {{-- Darker selection boxes --}}
                                <div class="p-4 rounded-xl border border-zinc-900 bg-zinc-950 hover:bg-zinc-900 transition-all duration-300 peer-checked:border-red-900 peer-checked:bg-red-900/10 peer-checked:ring-1 peer-checked:ring-red-900/50">
                                    <div class="flex flex-col items-center text-center gap-2">
                                        <svg class="w-6 h-6 text-zinc-600 peer-checked:text-red-600 group-hover:text-zinc-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                        <span class="text-sm font-semibold text-zinc-400 peer-checked:text-white">Candidate</span>
                                        <span class="text-[10px] text-zinc-600">I'm looking for a job</span>
                                    </div>
                                </div>
                            </label>

                            <label class="relative cursor-pointer group">
                                <input type="radio" name="role" value="recruiter" class="peer sr-only">
                                <div class="p-4 rounded-xl border border-zinc-900 bg-zinc-950 hover:bg-zinc-900 transition-all duration-300 peer-checked:border-red-900 peer-checked:bg-red-900/10 peer-checked:ring-1 peer-checked:ring-red-900/50">
                                    <div class="flex flex-col items-center text-center gap-2">
                                        <svg class="w-6 h-6 text-zinc-600 peer-checked:text-red-600 group-hover:text-zinc-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                        <span class="text-sm font-semibold text-zinc-400 peer-checked:text-white">Recruiter</span>
                                        <span class="text-[10px] text-zinc-600">I'm hiring talent</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    {{-- INPUTS CHANGED: bg-zinc-200 (gray) and text-black (kahla) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1">
                            <x-input-label for="first_name" :value="__('First Name')" class="text-zinc-500" />
                            <input id="first_name" type="text" name="first_name" :value="old('first_name')" required autofocus 
                                class="w-full rounded-xl bg-zinc-200 border border-zinc-800 text-black px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 placeholder-zinc-500 transition-all outline-none hover:bg-zinc-100"
                                placeholder="John" />
                            <x-input-error :messages="$errors->get('first_name')" />
                        </div>
                        <div class="space-y-1">
                            <x-input-label for="last_name" :value="__('Last Name')" class="text-zinc-500" />
                            <input id="last_name" type="text" name="last_name" :value="old('last_name')" required 
                                class="w-full rounded-xl bg-zinc-200 border border-zinc-800 text-black px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 placeholder-zinc-500 transition-all outline-none hover:bg-zinc-100"
                                placeholder="Doe" />
                            <x-input-error :messages="$errors->get('last_name')" />
                        </div>
                    </div>

                    <div class="space-y-1">
                        <x-input-label for="email" :value="__('Email Address')" class="text-zinc-500" />
                        <input id="email" type="email" name="email" :value="old('email')" required 
                            class="w-full rounded-xl bg-zinc-200 border border-zinc-800 text-black px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 placeholder-zinc-500 transition-all outline-none hover:bg-zinc-100"
                            placeholder="john@example.com" />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1">
                            <x-input-label for="password" :value="__('Password')" class="text-zinc-500" />
                            <input id="password" type="password" name="password" required 
                                class="w-full rounded-xl bg-zinc-200 border border-zinc-800 text-black px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 placeholder-zinc-500 transition-all outline-none hover:bg-zinc-100"
                                placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password')" />
                        </div>
                        <div class="space-y-1">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-zinc-500" />
                            <input id="password_confirmation" type="password" name="password_confirmation" required 
                                class="w-full rounded-xl bg-zinc-200 border border-zinc-800 text-black px-4 py-3 text-sm focus:border-red-600 focus:ring-1 focus:ring-red-600 placeholder-zinc-500 transition-all outline-none hover:bg-zinc-100"
                                placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password_confirmation')" />
                        </div>
                    </div>

                    <div class="pt-4 ">
                        <button type="submit" class="w-full  group relative flex justify-center py-2 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-red-600 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-red-800 transition-all duration-300 shadow-[0_5px_20px_rgba(185,28,28,0.2)] hover:shadow-[0_5px_30px_rgba(185,28,28,0.4)]">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-red-300 group-hover:text-red-200 transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Create Account
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-sm text-zinc-600">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="font-medium text-zinc-400 hover:text-red-500 transition-colors underline decoration-zinc-800 underline-offset-4 hover:decoration-red-500">
                                Sign in
                            </a>
                        </p>
                    </div>

                </form>
            </div>
            
            <div class="mt-8 text-center">
                <p class="text-xs text-zinc-700">&copy; {{ date('Y') }} JobMatch. All rights reserved.</p>
            </div>
        </div>
    </div>
</x-guest-layout>