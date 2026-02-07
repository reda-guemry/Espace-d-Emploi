<x-app-layout>

    {{-- Header Section --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div
                class="w-1.5 h-8 bg-gradient-to-b from-red-600 to-red-900 rounded-full shadow-[0_0_15px_rgba(220,38,38,0.5)]">
            </div>
            <h2 class="font-bold text-2xl text-white tracking-tight">
                {{ __('Account Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-black pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8 py-10">

            {{-- 1. Profile Information --}}



            <div
                class="group p-8 bg-black border border-red-900/50 shadow-2xl shadow-red-900/10 rounded-3xl relative overflow-hidden transition-all duration-300 hover:border-red-600/30">

                {{-- Decorative Glow --}}
                <div
                    class="absolute top-0 right-0 -mt-10 -mr-10 w-60 h-60 bg-red-600/10 rounded-full blur-[80px] pointer-events-none group-hover:bg-red-600/20 transition duration-500">
                </div>

                <div class="w-full relative z-10">
                    <header class="mb-6 border-b border-white/5 pb-4">
                        <h3 class="text-xl font-bold text-white mb-1">Profile Information</h3>
                        <p class="text-sm text-zinc-400">Update your account's profile information and email address.
                        </p>
                    </header>

                    <div class="w-full">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            {{-- 2. Professional Info (Education & Experience) --}}
            @if ($user->role === 'candidate')
                <div
                    class="group p-8 bg-black border border-red-900/50 shadow-2xl shadow-red-900/10 rounded-3xl relative overflow-hidden transition-all duration-300 hover:border-red-600/30">

                    {{-- Decorative Glow --}}
                    <div
                        class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-red-600/5 rounded-full blur-[100px] pointer-events-none">
                    </div>

                    <div class="w-full relative z-10">
                        {{-- Note: The header is likely inside the partial, but if not, add it here --}}
                        @include('profile.partials.update-professional-info')
                    </div>
                </div>
            @endif

            {{-- 3. Security (Password) --}}
            <div
                class="group p-8 bg-black border border-red-900/50 shadow-2xl shadow-red-900/10 rounded-3xl relative overflow-hidden transition-all duration-300 hover:border-red-600/30">

                {{-- Decorative Glow (Changed Blue to Red) --}}
                <div
                    class="absolute top-0 right-0 -mt-10 -mr-10 w-60 h-60 bg-red-600/10 rounded-full blur-[80px] pointer-events-none group-hover:bg-red-600/20 transition duration-500">
                </div>

                <div class="w-full relative z-10">
                    <header class="mb-6 border-b border-white/5 pb-4">
                        <h3 class="text-xl font-bold text-white mb-1">Security</h3>
                        <p class="text-sm text-zinc-400">Ensure your account is using a long, random password to stay
                            secure.</p>
                    </header>

                    <div class="w-full">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            {{-- 4. Danger Zone (Delete) --}}
            <div
                class="group p-8 bg-black border border-red-500/30 shadow-2xl shadow-red-900/10 rounded-3xl relative overflow-hidden transition-all duration-300 hover:border-red-500/50">

                {{-- Background Tint for Danger Zone --}}
                <div class="absolute inset-0 bg-red-950/10 pointer-events-none"></div>

                <div class="w-full relative z-10">
                    <header class="mb-6 border-b border-red-500/20 pb-4">
                        <h3 class="text-xl font-bold text-red-500 mb-1 flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            Danger Zone
                        </h3>
                        <p class="text-sm text-zinc-400">Once your account is deleted, all of its resources and data
                            will be permanently deleted.</p>
                    </header>

                    <div class="w-full">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>