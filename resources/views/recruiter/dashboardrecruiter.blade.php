<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Recruiter Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-1 h-12 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                    <div>
                        <h1 class="text-3xl font-bold text-white">Find Your Perfect Candidate</h1>
                        <p class="text-gray-500 mt-1">Search and connect with talented professionals</p>
                    </div>
                </div>
            </div>

            <!-- Search & Filters Section -->
            <div class="bg-zinc-900 backdrop-blur-xl rounded-2xl shadow-lg shadow-red-900/10 border border-red-900/30 p-6 mb-8">
                <form method="GET" action="{{ route('recruiter.dashboard') }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <!-- Search by Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                Search by Name
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </span>
                                <input 
                                    type="text" 
                                    name="search" 
                                    placeholder="Search candidates..."
                                    value="{{ request('search') }}"
                                    class="w-full bg-zinc-800 border border-zinc-700 text-gray-200 placeholder-gray-600 rounded-xl pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600 transition-all duration-200"
                                >
                            </div>
                        </div>

                        <!-- Filter by Category -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                                Category
                            </label>
                            <div class="relative">
                                <select
                                    name="category"
                                    class="w-full bg-zinc-800 border border-zinc-700 text-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600 transition-all duration-200 appearance-none cursor-pointer pr-10">
                                    <option value="">All Categories</option>
                                    <option value="developer" {{ request('category') == 'developer' ? 'selected' : '' }}>Developer</option>
                                    <option value="designer" {{ request('category') == 'designer' ? 'selected' : '' }}>Designer</option>
                                    <option value="marketing" {{ request('category') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="sales" {{ request('category') == 'sales' ? 'selected' : '' }}>Sales</option>
                                    <option value="management" {{ request('category') == 'management' ? 'selected' : '' }}>Management</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Search Button -->
                    <div class="mt-4 flex items-center gap-3">
                        <button 
                            type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl transition-all shadow-lg shadow-red-900/50">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Search
                        </button>
                        
                        @if(request('search') || request('category'))
                        <a 
                            href="{{ route('recruiter.dashboard') }}"
                            class="px-6 py-2.5 bg-zinc-800 hover:bg-zinc-700 border border-red-900/30 text-gray-300 font-semibold rounded-xl transition-all">
                            Clear Filters
                        </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Results Header -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></div>
                    <h2 class="text-xl font-bold text-white">
                        Candidates Found
                    </h2>
                </div>
                
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <span>Sort by:</span>
                    <select class="bg-zinc-900 border border-zinc-800 text-gray-300 rounded-lg px-3 py-1 text-sm focus:ring-2 focus:ring-red-600">
                        <option>Most Recent</option>
                        <option>Best Match</option>
                        <option>Experience</option>
                    </select>
                </div>
            </div>

            <!-- Candidates List -->
            <div class="bg-zinc-900 backdrop-blur-xl rounded-2xl shadow-lg shadow-red-900/10 border border-red-900/30 overflow-hidden">
                
                <div class="divide-y divide-red-900/20">

                    @forelse($candidates as $candidate)
                        <div class="p-6 hover:bg-zinc-800/50 transition-all group">
                            <div class="flex items-start gap-6">
                                
                                <!-- Profile Image -->
                                <div class="relative flex-shrink-0">
                                    <img 
                                        src="{{ asset('storage/profiles/' . $candidate->profile_photo) }}" 
                                        class="w-20 h-20 rounded-full ring-4 ring-zinc-800 group-hover:ring-red-600 shadow-xl object-cover transition-all" 
                                        alt="{{ $candidate->first_name }}"
                                    >
                                    <div class="absolute bottom-0 right-0 w-5 h-5 bg-red-600 rounded-full border-4 border-zinc-900 animate-pulse">
                                    </div>
                                </div>

                                <!-- Info -->
                                <div class="flex-1">
                                    <div class="flex items-start justify-between mb-3">
                                        <div>
                                            <h3 class="text-lg font-bold text-white mb-1 group-hover:text-red-400 transition-colors">
                                                {{ $candidate->first_name }} {{ $candidate->last_name }}
                                            </h3>
                                            <div class="flex items-center gap-3 mb-2">
                                                <p class="text-sm text-red-400 font-medium">
                                                    {{ $candidate->specialty }}
                                                </p>
                                                <span class="text-gray-600">•</span>
                                                <p class="text-sm text-gray-500">
                                                    {{ $candidate->location ?? 'Remote' }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex gap-2">
                                            <a 
                                                href="#"
                                                class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-xl text-sm font-semibold shadow-lg shadow-red-900/50 transition-all">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                View Profile
                                            </a>
                                            <button
                                                class="w-10 h-10 rounded-xl bg-zinc-800 border border-red-900/30 hover:border-red-600 hover:bg-red-600 text-gray-400 hover:text-white transition-all flex items-center justify-center group">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Bio -->
                                    <p class="text-sm text-gray-400 line-clamp-2 mb-4">
                                        {{ $candidate->bio ?? 'Experienced professional looking for new opportunities.' }}
                                    </p>

                                    <!-- Skills -->
                                    {{-- @if($candidate->skills && $candidate->skills->count() > 0)
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($candidate->skills->take(5) as $skill)
                                        <span class="px-3 py-1 bg-zinc-800 border border-red-900/30 text-gray-300 text-xs font-medium rounded-lg">
                                            {{ $skill->name }}
                                        </span>
                                        @endforeach
                                        
                                        @if($candidate->skills->count() > 5)
                                        <span class="px-3 py-1 bg-red-900/20 border border-red-900/30 text-red-400 text-xs font-medium rounded-lg">
                                            +{{ $candidate->skills->count() - 5 }} more
                                        </span>
                                        @endif
                                    </div>
                                    @endif --}}

                                    <!-- Stats -->
                                    <div class="flex items-center gap-6 mt-4 pt-4 border-t border-red-900/20">
                                        <div class="flex items-center gap-2 text-xs text-gray-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            <span>{{ $candidate->experiences_count ?? 0 }} Years Experience</span>
                                        </div>
                                        
                                        <div class="flex items-center gap-2 text-xs text-gray-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span>Active </span>
                                        </div>

                                        <div class="flex items-center gap-2 text-xs text-gray-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                            <span>{{ $candidate->connections_count ?? 0 }} Connections</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <!-- Empty State -->
                        <div class="p-16 text-center">
                            <div class="w-20 h-20 bg-zinc-800 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">No candidates found</h3>
                            <p class="text-gray-500 mb-6">Try adjusting your search or filters to find more candidates</p>
                            <a 
                                href="{{ route('recruiter.dashboard') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl transition-all shadow-lg shadow-red-900/50">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Reset Filters
                            </a>
                        </div>
                    @endforelse

                </div>

                <!-- Pagination -->
                {{-- @if($candidates->hasPages())
                <div class="px-6 py-4 bg-zinc-800/50 border-t border-red-900/20">
                    {{ $candidates->links() }}
                </div>
                @endif --}}

            </div>

        </div>
    </div>

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #18181b;
        }
        ::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #ef4444;
        }
    </style>
</x-app-layout>