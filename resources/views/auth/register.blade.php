<x-guest-layout>
    <div class="bg-slate-900 text-white p-6 sm:p-10 rounded-xl border border-slate-800 shadow-[0_0_20px_rgba(37,99,235,0.1)]">
        
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold tracking-tighter text-white">Talentia<span class="text-blue-500">.</span></h1>
            <p class="text-slate-400 text-sm mt-2">Create your account to get started.</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" for="first_name">
                        First Name
                    </label>
                    <input class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                           id="first_name" type="text" name="first_name" :value="old('first_name')" required autofocus placeholder="Ahmed">
                    <x-input-error :messages="$errors->get('first_name')" class="mt-1" />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" for="last_name">
                        Last Name
                    </label>
                    <input class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                           id="last_name" type="text" name="last_name" :value="old('last_name')" required placeholder="Ali">
                    <x-input-error :messages="$errors->get('last_name')" class="mt-1" />
                </div>
            </div>

            <div class="mb-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" for="email">
                    Email Address
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <input class="w-full pl-10 pr-4 py-3 bg-slate-950 border border-slate-800 rounded text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                           id="email" type="email" name="email" :value="old('email')" required placeholder="name@company.com">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div class="mb-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" for="role">
                    Join As
                </label>
                <div class="relative">
                    <select id="role" name="role" class="block w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer">
                        <option value="candidate">Candidate (Looking for jobs)</option>
                        <option value="recruiter">Recruiter (Hiring talent)</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('role')" class="mt-1" />
            </div>

            <div class="mb-5">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" for="password">
                    Password
                </label>
                <input class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                       id="password" type="password" name="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="mb-8">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" for="password_confirmation">
                    Confirm Password
                </label>
                <input class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded text-slate-200 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                       id="password_confirmation" type="password" name="password_confirmation" required>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            <div class="flex flex-col gap-4">
                <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded shadow-lg shadow-blue-500/30 transition duration-200 transform hover:-translate-y-0.5">
                    Create Account
                </button>
                
                <div class="text-center mt-2">
                    <a class="text-sm text-slate-500 hover:text-blue-400 transition-colors" href="{{ route('login') }}">
                        Already have an account? <span class="text-blue-500 font-semibold">Sign in</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>