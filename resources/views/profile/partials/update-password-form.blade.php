<section class="p-6 bg-black border border-zinc-800 rounded-2xl shadow-xl">
    <header>
        <div class="flex items-center gap-3">
            <div class="p-2 bg-red-600/10 rounded-lg">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white tracking-tight">
                    {{ __('Update Password') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __('Ensure your account is using a long, random password.') }}
                </p>
            </div>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-5">
        @csrf
        @method('put')

        <div class="space-y-1">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-gray-400 text-xs font-semibold uppercase tracking-wider ml-1" />
            
            <div class="relative group">
                <x-text-input 
                    id="update_password_current_password" 
                    name="current_password" 
                    type="password" 
                    class="block w-full bg-zinc-900/50 border-zinc-800 text-white rounded-xl py-3 px-4 focus:border-red-600 focus:ring-1 focus:ring-red-600 placeholder-zinc-700 transition-all duration-300" 
                    autocomplete="current-password" 
                />
            </div>
            
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-sm text-red-500 font-medium" />
        </div>

        <div class="space-y-1">
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-gray-400 text-xs font-semibold uppercase tracking-wider ml-1" />
            
            <x-text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="block w-full bg-zinc-900/50 border-zinc-800 text-white rounded-xl py-3 px-4 focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-300" 
                autocomplete="new-password" 
            />
            
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-sm text-red-500 font-medium" />
        </div>

        <div class="space-y-1">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-gray-400 text-xs font-semibold uppercase tracking-wider ml-1" />
            
            <x-text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="block w-full bg-zinc-900/50 border-zinc-800 text-white rounded-xl py-3 px-4 focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-300" 
                autocomplete="new-password" 
            />
            
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-sm text-red-500 font-medium" />
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-zinc-800/50">
            <div class="flex items-center gap-4">
                <x-primary-button class="bg-red-600 hover:bg-red-700 active:scale-95 text-white border-none shadow-lg shadow-red-600/20 px-8 py-3 rounded-xl font-bold transition-all duration-200">
                    {{ __('Update Security') }}
                </x-primary-button>

                @if (session('status') === 'password-updated')
                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-x-2"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-init="setTimeout(() => show = false, 3000)"
                        class="flex items-center gap-2 px-3 py-1.5 bg-green-500/10 border border-green-500/20 rounded-full text-green-500 text-sm font-medium"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        {{ __('Password successfully changed.') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
</section>