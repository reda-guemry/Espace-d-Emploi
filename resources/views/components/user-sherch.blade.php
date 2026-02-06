<?php

use Livewire\Component;
use App\Models\User;

new class extends Component {

    public $search = '';

    public function with(): array
    {
        if (strlen($this->search) < 2) {
            return ['users' => []];
        }

        // var_dump(User::whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$this->search}%"])
        //         ->take(5)
        //         ->get(),) ;
        // exit ; 

        return [
            'users' => User::whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$this->search}%"])
                ->take(5)
                ->get(),
        ];
    }
    
}; ?>

<div class="relative w-full mb-6 z-50">

    <div class="relative group">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-500 group-focus-within:text-red-500 transition-colors" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <div class="relative hidden md:block mt-6">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
            <input type="text" wire:model.live.debounce.300ms="search"
                class="bg-zinc-900 border border-zinc-800 rounded-lg py-2 pl-10 pr-4 text-sm w-64 focus:ring-2 focus:ring-red-600 focus:border-red-600 placeholder-gray-600 text-gray-200 focus:w-80 transition-all"
                placeholder="Search...">
        </div>

        <div wire:loading class="absolute inset-y-0 right-0 pr-4 flex items-center">
            <svg class="animate-spin h-5 w-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        </div>
    </div>

    @if(strlen($search) >= 2)
        <div
            class="absolute mt-2 w-full bg-zinc-900 border border-red-900/30 rounded-xl shadow-2xl shadow-black overflow-hidden z-50 ring-1 ring-black ring-opacity-5">

            @if(count($users) > 0)
                <ul class="py-1">
                    @foreach($users as $user)
                        <li class="border-b border-red-900/10 last:border-0">
                            <a href="{{ $user ->Public_profil_url }}" class="block px-4 py-3 hover:bg-zinc-800 transition-colors duration-150 group">
                                <div class="flex items-center">

                                    <div class="flex-shrink-0 relative">
                                        <img class="h-10 w-10 rounded-full object-cover border-2 border-zinc-800 group-hover:border-red-600 transition"
                                            src="{{ asset('storage/profiles/' . $user->profile_photo) }}"
                                            alt="{{ $user->first_name }} {{ $user->last_name }}">

                                        <span
                                            class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-zinc-900 bg-green-500"></span>
                                    </div>

                                    <div class="ml-4 flex-1">
                                        <div class="flex justify-between items-center">
                                            <p class="text-sm font-semibold text-gray-200 group-hover:text-white truncate">
                                                {{ $user->first_name }} {{ $user->last_name }}
                                            </p>

                                            <span
                                                class="text-xs text-red-500 font-medium opacity-0 group-hover:opacity-100 transition-opacity">
                                                View Profile
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-500 truncate group-hover:text-gray-400">
                                            {{ $user->email }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach

                    <li class="bg-zinc-800/50 p-2 text-center border-t border-red-900/20">
                        <a href="#" class="text-xs font-bold text-red-500 hover:text-red-400 transition">
                            View all results for "{{ $search }}"
                        </a>
                    </li>
                </ul>
            @else
                <div class="px-4 py-6 text-center">
                    <div class="mx-auto flex items-center justify-center h-10 w-10 rounded-full bg-zinc-800 mb-2">
                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-400">No user found named "<span
                            class="text-white font-medium">{{ $search }}</span>"</p>
                </div>
            @endif
        </div>
    @endif
</div>