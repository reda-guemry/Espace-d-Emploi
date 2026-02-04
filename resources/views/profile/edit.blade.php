<x-app-layout>
    
    {{-- Header Section --}}
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <div class="w-1 h-6 bg-red-600 rounded-full"></div>
            <h2 class="font-bold text-xl text-gray-100 leading-tight">
                {{ __('Account Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-black pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8 py-8">
            
            <div class="p-8 bg-black border border-red-900/50 shadow-xl shadow-red-900/10 rounded-3xl relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-red-600/10 rounded-full blur-3xl pointer-events-none group-hover:bg-red-600/20 transition duration-500"></div>

                <div class="max-w-xl relative z-10">
                    <h3 class="text-lg font-medium text-white mb-2">Profile Information</h3>
                    <p class="text-sm text-gray-400 mb-6">Update your account's profile information and email address.</p>
                    
                    {{-- Form Partial --}}
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 bg-black border border-red-900/50 shadow-xl shadow-red-900/10 rounded-3xl relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-blue-600/5 rounded-full blur-3xl pointer-events-none group-hover:bg-blue-600/10 transition duration-500"></div>

                <div class="max-w-xl relative z-10">
                    <h3 class="text-lg font-medium text-white mb-2">Security</h3>
                    <p class="text-sm text-gray-400 mb-6">Ensure your account is using a long, random password to stay secure.</p>
                    
                    {{-- Form Partial --}}
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 bg-black border border-red-900/50 shadow-xl shadow-red-900/10 rounded-3xl relative overflow-hidden">
                <div class="max-w-xl relative z-10">
                    <h3 class="text-lg font-medium text-red-500 mb-2">Danger Zone</h3>
                    <p class="text-sm text-gray-400 mb-6">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                    
                    {{-- Form Partial --}}
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>