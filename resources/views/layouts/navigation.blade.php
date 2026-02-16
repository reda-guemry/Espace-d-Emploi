<nav x-data="{ open: false }" class="bg-black border-b border-red-900/30 sticky top-0 z-50 shadow-lg shadow-red-900/20">

    {{-- 1. Setup Logic: Henna kan7dodo rwat 3la hsab role --}}
    @php
        // Ila kan recruiter, sifto l recruiter dashboard, sinon candidate dashboard
        $dashboardRoute = Auth::user()->hasRole('recruiter') ? 'recruiter.dashboard' : 'candidate.dashboard';

        // Nfs chi bnisba l Jobs (Recruiter kaychouf 'My Jobs' matalan, Candidate kaychouf 'Find Jobs')
        // Hna ghankhliha 'jobs.index' kmital, walakin t9dr tbdelha
        $jobsRoute = 'jobs.index'; 
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center gap-6">
                <a href="{{ route($dashboardRoute) }}"
                    class="font-bold text-2xl text-white tracking-tighter hover:opacity-80 transition">
                    Job<span class="text-red-600">Match</span>
                </a>

                <livewire:user-sherch />
            </div>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium">

                {{-- Dynamic Home Link --}}
                <a href="{{ route($dashboardRoute) }}"
                    class="h-full flex flex-col justify-center px-1 border-b-2 transition duration-150 ease-in-out {{ request()->routeIs($dashboardRoute) ? 'border-red-600 text-white' : 'border-transparent text-gray-500 hover:text-gray-300 hover:border-red-900/50' }}">
                    <span class="flex items-center gap-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="hidden lg:block">Dashboard</span>
                    </span>
                </a>

                {{-- Profile Link --}}
                <a href="{{ route('profile.edit') }}"
                    class="h-full flex flex-col justify-center px-1 border-b-2 transition duration-150 ease-in-out {{ request()->routeIs('profile.*') ? 'border-red-600 text-white' : 'border-transparent text-gray-500 hover:text-gray-300 hover:border-red-900/50' }}">
                    <span class="flex items-center gap-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="hidden lg:block">Profile</span>
                    </span>
                </a>

                {{-- Jobs Link (Example: Different text based on role) --}}
                <a href=""
                    class="h-full flex flex-col justify-center px-1 border-b-2 transition duration-150 ease-in-out {{ request()->routeIs('jobs.*') ? 'border-red-600 text-white' : 'border-transparent text-gray-500 hover:text-gray-300 hover:border-red-900/50' }}">
                    <span class="flex items-center gap-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="hidden lg:block">
                            {{ Auth::user()->hasRole('recruiter') ? 'Manage Jobs' : 'Find Jobs' }}
                        </span>
                    </span>
                </a>
            </div>

            <div class="flex items-center gap-4">

                <div class="hidden sm:flex items-center gap-3 text-gray-500">
                    <a href="#" class="hover:text-red-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </a>
                    <button class="hover:text-red-500 transition-colors relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span
                            class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] font-bold rounded-full h-4 w-4 flex items-center justify-center animate-pulse">3</span>
                    </button>
                </div>

                <div class="hidden sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">

                        {{-- TRIGGER BUTTON --}}
                        <x-slot name="trigger">
                            <button
                                class="flex items-center gap-2 px-2 py-1 rounded-lg focus:outline-none transition ease-in-out duration-300 group hover:bg-zinc-900/50 border border-transparent hover:border-red-900/30">

                                {{-- Avatar --}}
                                <div class="relative">
                                    <img class="h-9 w-9 rounded-full object-cover border-2 border-red-900/30 group-hover:border-red-600 transition-colors duration-300"
                                        src="{{ asset('storage/profiles/' . Auth::user()->profile_photo) }}"
                                        alt="{{ Auth::user()->name }}">
                                    {{-- Online Status Dot (Optional Detail) --}}
                                    <div
                                        class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-red-600 border-2 border-black rounded-full">
                                    </div>
                                </div>

                                {{-- Text Info --}}
                                <div class="hidden lg:block text-left">
                                    <div
                                        class="text-sm font-bold text-white group-hover:text-red-500 transition-colors">
                                        {{ Auth::user()->name }}</div>
                                    <div
                                        class="text-[10px] uppercase tracking-wider font-semibold text-zinc-500 group-hover:text-red-400 flex items-center gap-1 transition-colors">
                                        My Account
                                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                            </button>
                        </x-slot>

                        {{-- DROPDOWN CONTENT --}}
                        <x-slot name="content">
                            <div class="bg-black border border-red-900/20 rounded-md overflow-hidden">

                                <div class="px-4 py-3 border-b border-red-900/20 bg-zinc-950">
                                    <div class="font-bold text-sm text-white">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-zinc-500 font-mono">{{ Auth::user()->email }}</div>
                                </div>

                                <x-dropdown-link :href="route('profile.edit')"
                                    class="text-zinc-400 hover:text-white hover:bg-zinc-900 border-l-2 border-transparent hover:border-red-600 transition-all">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        {{ __('Profile') }}
                                    </div>
                                </x-dropdown-link>

                                <div class="border-t border-red-900/20"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        class="text-red-500 hover:text-red-400 hover:bg-red-950/20 border-l-2 border-transparent hover:border-red-500 transition-all"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            {{ __('Log Out') }}
                                        </div>
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>


                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-white hover:bg-zinc-900 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black border-t border-red-900/30">
        <div class="pt-2 pb-3 space-y-1">
            {{-- Dynamic Dashboard Link for Mobile --}}
            <x-responsive-nav-link :href="route($dashboardRoute)" :active="request()->routeIs($dashboardRoute)"
                class="text-gray-400 hover:text-white hover:bg-zinc-900">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')"
                class="text-gray-400 hover:text-white hover:bg-zinc-900">
                {{ __('Profile') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-red-900/30">
            <div class="px-4 flex items-center gap-3">
                <img class="h-10 w-10 rounded-full object-cover border-2 border-zinc-800"
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=DC2626&color=fff"
                    alt="{{ Auth::user()->name }}">
                <div>
                    <div class="font-medium text-base text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-600">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        class="text-red-400 hover:text-red-300 hover:bg-zinc-900"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>