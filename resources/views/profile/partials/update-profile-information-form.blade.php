<section class="relative" x-data="{ activeModal: null }">
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

        {{-- =======================
        1. COVER & AVATAR
        ======================= --}}
        <div class="bg-zinc-900/50 border border-zinc-800 rounded-3xl overflow-hidden p-1 shadow-2xl">

            <div class="relative group w-full h-52 bg-zinc-950 rounded-2xl overflow-hidden">

                <input id="cover_photo" name="cover_photo" type="file" class="hidden"
                    onchange="document.getElementById('cover-preview').src = window.URL.createObjectURL(this.files[0])">

                <label for="cover_photo" class="absolute inset-0 cursor-pointer w-full h-full z-10">

                    <img id="cover-preview" src="{{ asset('storage/covers/' . $user->cover_photo) }}"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-105 group-hover:opacity-50">

                    <div
                        class="absolute inset-0 flex items-center justify-center transition duration-300 {{ $user->cover_photo ? 'opacity-0 group-hover:opacity-100' : 'opacity-100' }}">
                        <span
                            class="bg-black/50 backdrop-blur-md border border-white/10 px-4 py-2 rounded-full text-zinc-200 font-medium text-sm flex items-center gap-2 hover:bg-red-600 hover:text-white hover:border-red-500 transition-all shadow-xl">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $user->cover_photo ? 'Change Cover' : 'Upload Cover' }}
                        </span>
                    </div>
                </label>
            </div>

            <div class="px-8 relative -mt-12 mb-4 pointer-events-none">
                <div class="relative group/avatar w-28 h-28 pointer-events-auto">
                    <div
                        class="z-50 w-full h-full rounded-3xl border-[6px] border-black bg-zinc-800 overflow-hidden shadow-xl relative">


                        <img id="profile-photo" src="{{ asset('storage/profiles/' . $user->profile_photo) }}"
                            class="w-full h-full object-cover z-50">

                        <label for="profile_photo"
                            class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover/avatar:opacity-100 cursor-pointer transition duration-300 z-10 backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                </path>
                            </svg>
                            <input id="profile_photo" name="profile_photo" type="file" class="hidden"
                                onchange="document.getElementById('profile-photo').src = window.URL.createObjectURL(this.files[0])">
                        </label>
                    </div>
                </div>
            </div>
        </div>

        {{-- =======================
        2. INPUT FIELDS
        ======================= --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- First Name --}}
            <div class="space-y-2">
                <x-input-label for="first_name" :value="__('First Name')"
                    class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1" />
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-500 group-focus-within:text-red-500 transition-colors duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <x-text-input id="first_name" name="first_name" type="text"
                        class="pl-12 block w-full bg-zinc-950 border-zinc-800 text-gray-100 rounded-xl focus:border-red-500 focus:ring-red-500/20 py-3.5 transition-all shadow-inner"
                        :value="old('first_name', $user->first_name)" required />
                </div>
                <x-input-error class="mt-2 text-red-400 text-sm" :messages="$errors->get('first_name')" />
            </div>

            {{-- Last Name --}}
            <div class="space-y-2">
                <x-input-label for="last_name" :value="__('Last Name')"
                    class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1" />
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-500 group-focus-within:text-red-500 transition-colors duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <x-text-input id="last_name" name="last_name" type="text"
                        class="pl-12 block w-full bg-zinc-950 border-zinc-800 text-gray-100 rounded-xl focus:border-red-500 focus:ring-red-500/20 py-3.5 transition-all shadow-inner"
                        :value="old('last_name', $user->last_name)" required />
                </div>
                <x-input-error class="mt-2 text-red-400 text-sm" :messages="$errors->get('last_name')" />
            </div>

            {{-- Email --}}
            <div class="md:col-span-2 space-y-2">
                <x-input-label for="email" :value="__('Email Address')"
                    class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1" />
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-500 group-focus-within:text-red-500 transition-colors duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <x-text-input id="email" name="email" type="email"
                        class="pl-12 block w-full bg-zinc-950 border-zinc-800 text-gray-100 rounded-xl focus:border-red-500 focus:ring-red-500/20 py-3.5 transition-all shadow-inner"
                        :value="old('email', $user->email)" required />
                </div>
                <x-input-error class="mt-2 text-red-400 text-sm" :messages="$errors->get('email')" />
            </div>

            {{-- Specialty (Headline) --}}
            <div class="md:col-span-2 space-y-2">
                <x-input-label for="specialty" :value="__('Skills')"
                    class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1" />

                <livewire:skill-add />

                <x-input-error class="mt-2 text-red-400 text-sm" :messages="$errors->get('specialty')" />
            </div>

            {{-- Bio --}}
            <div class="md:col-span-2 space-y-2">
                <x-input-label for="bio" :value="__('Professional Bio')"
                    class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1" />
                <div class="relative group">
                    <div class="absolute top-4 left-0 pl-4 flex items-start pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-500 group-focus-within:text-red-500 transition-colors duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                    </div>
                    <textarea id="bio" name="bio" rows="4"
                        class="pl-12 block w-full bg-zinc-950 border-zinc-800 text-gray-100 rounded-xl focus:border-red-500 focus:ring-red-500/20 py-3 px-4 transition-all shadow-inner resize-none placeholder-zinc-700"
                        placeholder="Write a short introduction...">{{ old('bio', $user->bio) }}</textarea>
                </div>
                <x-input-error class="mt-2 text-red-400 text-sm" :messages="$errors->get('bio')" />
            </div>
        </div>

        {{-- =======================
        3. HISTORY SECTION (Triggers)
        ======================= --}}
        <div class="pt-6" >
            <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span class="w-1 h-6 bg-red-600 rounded-full"></span>
                Professional History
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <button type="button" @click="activeModal = 'experience'"
                    class="group relative bg-zinc-900 border border-zinc-800 rounded-2xl p-5 hover:border-red-500/50 hover:bg-zinc-900/80 transition-all duration-300 w-full text-left">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-red-500/10 flex items-center justify-center text-red-500 group-hover:bg-red-500 group-hover:text-white transition duration-300 shadow-lg shadow-red-900/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold group-hover:text-red-400 transition">Add Experience
                                </h4>
                                <p class="text-xs text-zinc-500">Add a past or current job</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-zinc-600 group-hover:text-red-500 transform group-hover:translate-x-1 transition"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                </button>

                <button type="button" @click="activeModal = 'education'"
                    class="group relative bg-zinc-900 border border-zinc-800 rounded-2xl p-5 hover:border-blue-500/50 hover:bg-zinc-900/80 transition-all duration-300 w-full text-left">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition duration-300 shadow-lg shadow-blue-900/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold group-hover:text-blue-400 transition">Add Education
                                </h4>
                                <p class="text-xs text-zinc-500">Add a degree or certificate</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-zinc-600 group-hover:text-blue-500 transform group-hover:translate-x-1 transition"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                </button>
            </div>


        </div>

        <div class="flex items-center justify-end gap-4 pt-6 border-t border-zinc-800/50">
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-500 font-bold flex items-center gap-2">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    {{ __('Changes Saved') }}
                </p>
            @endif

            <x-primary-button
                class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg shadow-red-900/40 border border-red-500/20">
                {{ __('Save Changes') }}
            </x-primary-button>
        </div>
    </form>
    {{-- INCLUDE MODALS HERE (Inside the x-data scope) --}}
    @include('profile.partials.experience-modal')
    @include('profile.partials.education-modal')
</section>