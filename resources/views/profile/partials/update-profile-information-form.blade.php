<section class="relative">
    
    <header class="mb-8 relative z-10">
        <h2 class="text-2xl font-bold text-white tracking-tight">
            {{ __('Profile Settings') }}
        </h2>
        <p class="mt-2 text-sm text-gray-400 max-w-2xl">
            Update your public persona. This information will be displayed on your profile page.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('patch')

        <div class="bg-zinc-900/50 border border-zinc-800 rounded-3xl overflow-hidden p-1 shadow-2xl">
            <div class="relative group w-full h-52 bg-zinc-950 rounded-2xl overflow-hidden cursor-pointer">
                @if(isset($user->cover_photo))
                    <img src="{{ asset('storage/covers/' . $user->cover_photo) }}" class="w-full h-full object-cover opacity-70 transition-transform duration-700 group-hover:scale-105">
                @else
                    <div class="w-full h-full bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                         <span class="text-zinc-600 font-medium tracking-wider uppercase text-sm">Upload Cover Image</span>
                    </div>
                @endif
                
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                    <label for="cover_photo" class="bg-zinc-900/80 backdrop-blur-md text-white px-4 py-2 rounded-full border border-zinc-700 hover:border-red-500 hover:text-red-500 transition cursor-pointer flex items-center gap-2 text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Change Cover
                    </label>
                    <input id="cover_photo" name="cover_photo" type="file" class="hidden">
                </div>
            </div>

            <div class="px-8 relative -mt-12 mb-4 flex items-end justify-between">
                <div class="relative group/avatar">
                    <div class="w-28 h-28 rounded-3xl border-[6px] border-black bg-zinc-800 overflow-hidden shadow-xl">
                        @if(isset($user->profile_photo))
                            <img src="{{ asset('storage/profiles/' . $user->profile_photo) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-3xl font-bold text-zinc-600 bg-zinc-900">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @endif
                        
                        <label for="profile_photo" class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover/avatar:opacity-100 cursor-pointer transition duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                            <input id="profile_photo" name="profile_photo" type="file" class="hidden">
                        </label>
                    </div>
                    <div class="absolute bottom-2 -right-1 w-6 h-6 bg-black rounded-full flex items-center justify-center z-20">
                        <div class="w-3 h-3 bg-green-500 rounded-full border border-black"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Full Name')" class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1" />
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-500 group-focus-within:text-red-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <x-text-input id="name" name="name" type="text" class="pl-12 block w-full bg-zinc-900 border-zinc-800 text-gray-100 rounded-xl focus:border-red-500/50 focus:ring-4 focus:ring-red-500/10 placeholder-zinc-600 py-3.5 transition-all shadow-inner" :value="old('name', $user->name)" required autocomplete="name" placeholder="John Doe" />
                </div>
                <x-input-error class="mt-2 text-red-400 text-sm" :messages="$errors->get('name')" />
            </div>

            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email Address')" class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1" />
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-500 group-focus-within:text-red-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <x-text-input id="email" name="email" type="email" class="pl-12 block w-full bg-zinc-900 border-zinc-800 text-gray-100 rounded-xl focus:border-red-500/50 focus:ring-4 focus:ring-red-500/10 placeholder-zinc-600 py-3.5 transition-all shadow-inner" :value="old('email', $user->email)" required autocomplete="username" placeholder="john@example.com" />
                </div>
                <x-input-error class="mt-2 text-red-400 text-sm" :messages="$errors->get('email')" />
            </div>

            <div class="md:col-span-2 space-y-2">
                <x-input-label for="headline" :value="__('Headline / Role')" class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1" />
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-500 group-focus-within:text-red-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <x-text-input id="headline" name="headline" type="text" class="pl-12 block w-full bg-zinc-900 border-zinc-800 text-gray-100 rounded-xl focus:border-red-500/50 focus:ring-4 focus:ring-red-500/10 placeholder-zinc-600 py-3.5 transition-all shadow-inner" :value="old('headline', $user->headline ?? '')" placeholder="e.g. Senior Software Engineer at TechCorp" />
                </div>
            </div>

            <div class="md:col-span-2 space-y-2">
                <x-input-label for="bio" :value="__('About Me')" class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1" />
                <div class="relative group">
                     <textarea id="bio" name="bio" rows="4" class="block w-full bg-zinc-900 border-zinc-800 text-gray-100 rounded-xl focus:border-red-500/50 focus:ring-4 focus:ring-red-500/10 placeholder-zinc-600 py-3 px-4 transition-all shadow-inner resize-none" placeholder="Write a short professional biography...">{{ old('bio', $user->bio ?? '') }}</textarea>
                </div>
            </div>

        </div>

        <div class="pt-6">
            <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span class="w-1 h-6 bg-red-600 rounded-full"></span>
                Professional History
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                <div class="group relative bg-zinc-900 border border-zinc-800 rounded-2xl p-5 hover:border-red-500/30 transition-all duration-300 cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-red-500/10 flex items-center justify-center text-red-500 group-hover:bg-red-500 group-hover:text-white transition duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold">Experience</h4>
                                <p class="text-xs text-gray-500 group-hover:text-gray-400 transition">Job history & positions</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-red-500 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                    <a href="#" class="absolute inset-0 z-10"></a>
                </div>

                <div class="group relative bg-zinc-900 border border-zinc-800 rounded-2xl p-5 hover:border-red-500/30 transition-all duration-300 cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold">Education</h4>
                                <p class="text-xs text-gray-500 group-hover:text-gray-400 transition">Schools & Degrees</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-blue-500 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                     <a href="#" class="absolute inset-0 z-10"></a>
                </div>

                <div class="md:col-span-2 bg-zinc-900 border border-zinc-800 rounded-2xl p-5">
                    <x-input-label for="skills" :value="__('Skills')" class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1 mb-2" />
                    <x-text-input id="skills" name="skills" type="text" class="block w-full bg-black border-zinc-800 text-gray-100 rounded-xl focus:border-red-500/50 focus:ring-red-500/10 placeholder-zinc-700 py-3 transition-all" :value="old('skills', $user->skills ?? '')" placeholder="e.g. PHP, Laravel, Tailwind CSS (Separate by comma)" />
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-6 border-t border-zinc-800/50">
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-500 font-bold flex items-center gap-2"
                >
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    {{ __('Changes Saved') }}
                </p>
            @endif

            <x-primary-button class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white shadow-lg shadow-red-900/40 px-8 py-3 rounded-xl text-base font-bold tracking-wide transition-all transform hover:-translate-y-0.5 border border-red-500/20">
                {{ __('Save Profile') }}
            </x-primary-button>
        </div>
    </form>
</section>