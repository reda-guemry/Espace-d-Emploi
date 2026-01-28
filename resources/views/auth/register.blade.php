<x-guest-layout>
    <div class="min-h-screen bg-slate-950 flex flex-col justify-center items-center relative overflow-hidden px-4 sm:px-6 py-10">
        
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-3xl h-full bg-blue-600/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-600/10 rounded-full blur-[100px]"></div>
        </div>

        <div class="relative w-full max-w-lg">
            
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 shadow-lg shadow-blue-500/30 mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <h2 class="text-3xl font-bold text-white tracking-tight">Talentia</h2>
                <p class="text-slate-400 mt-2 text-sm">Join the future of professional hiring</p>
            </div>

            <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl p-8 relative overflow-hidden backdrop-blur-sm">
                
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-600"></div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" class="text-slate-300 text-xs uppercase font-bold tracking-wider mb-1" />
                            <x-text-input id="first_name" 
                                          class="block w-full bg-slate-950 border-slate-800 text-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg py-2.5 text-sm" 
                                          type="text" 
                                          name="first_name" 
                                          :value="old('first_name')" 
                                          required autofocus autocomplete="given-name" 
                                          placeholder="Ahmed" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="last_name" :value="__('Last Name')" class="text-slate-300 text-xs uppercase font-bold tracking-wider mb-1" />
                            <x-text-input id="last_name" 
                                          class="block w-full bg-slate-950 border-slate-800 text-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg py-2.5 text-sm" 
                                          type="text" 
                                          name="last_name" 
                                          :value="old('last_name')" 
                                          required autocomplete="family-name" 
                                          placeholder="Ali" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-1" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-slate-300 text-xs uppercase font-bold tracking-wider mb-1" />
                        <x-text-input id="email" 
                                      class="block w-full bg-slate-950 border-slate-800 text-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg py-2.5 text-sm" 
                                      type="email" 
                                      name="email" 
                                      :value="old('email')" 
                                      required autocomplete="username" 
                                      placeholder="name@example.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="role" :value="__('I am a...')" class="text-slate-300 text-xs uppercase font-bold tracking-wider mb-1" />
                        <div class="relative">
                            <select id="role" name="role" class="block w-full bg-slate-950 border-slate-800 text-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg py-2.5 text-sm shadow-sm appearance-none cursor-pointer">
                                <option value="candidate">Candidate (Job Seeker)</option>
                                <option value="recruiter">Recruiter (Hiring Talent)</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('role')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-slate-300 text-xs uppercase font-bold tracking-wider mb-1" />
                        <x-text-input id="password" 
                                      class="block w-full bg-slate-950 border-slate-800 text-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg py-2.5 text-sm" 
                                      type="password" 
                                      name="password" 
                                      required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-300 text-xs uppercase font-bold tracking-wider mb-1" />
                        <x-text-input id="password_confirmation" 
                                      class="block w-full bg-slate-950 border-slate-800 text-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg py-2.5 text-sm" 
                                      type="password" 
                                      name="password_confirmation" 
                                      required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <div class="pt-2">
                        <x-primary-button class="w-full justify-center py-3 text-sm font-bold tracking-wide uppercase bg-blue-600 hover:bg-blue-500 border-none shadow-lg shadow-blue-900/40 transition-all transform hover:-translate-y-0.5">
                            {{ __('Create Account') }}
                        </x-primary-button>
                    </div>

                    <div class="text-center">
                        <p class="text-sm text-slate-400">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-bold transition-colors">
                                Sign in
                            </a>
                        </p>
                    </div>
                </form>
            </div>

            <div class="mt-6 text-center text-xs text-slate-600">
                <a href="#" class="hover:text-slate-400 transition">Privacy Policy</a>
                <span class="mx-2">•</span>
                <a href="#" class="hover:text-slate-400 transition">Terms of Service</a>
            </div>

        </div>
    </div>
</x-guest-layout>