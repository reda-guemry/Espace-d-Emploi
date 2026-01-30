<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Recruiter Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header Section -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Find Your Perfect Candidate </h1>
                <p class="text-slate-400">Search and connect with talented professionals</p>
            </div>

            <!-- Search & Filters Section -->
            <div class="bg-slate-900/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Search by Name -->
                    <form method="GET"  action="{{ route('recruiter.dashboard') }}" class="mb-6" >
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Search by Name</label>
                            <div class="relative">

                                <input type="text" name="search" placeholder="Search candidates..."
                                    class="w-full  bg-slate-800/60 border border-slate-700  placeholder-slate-500 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            </div>
                        </div>

                    </form>
                    <!-- Filter by Category -->
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Category</label>
                        <div class="relative">
                            <select
                                class="w-full bg-slate-800/60 border border-slate-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none cursor-pointer">
                                <option value="">All Categories</option>
                                <option value="developer">Developer</option>
                                <option value="designer">Designer</option>
                                <option value="marketing">Marketing</option>
                                <option value="sales">Sales</option>
                                <option value="management">Management</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Candidates List -->
            <div
                class="bg-slate-900/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
                

                <div class="divide-y divide-slate-800">

                    @foreach($candidates as $condidat)

                        <div class="p-6 hover:bg-slate-800/50 transition-all">
                            <div class="flex items-start gap-6">
                                <!-- Profile Image -->
                                <div class="relative flex-shrink-0">
                                    <img src="{{ asset('storage/profiles/' . $condidat->profile_photo)  }}"
                                        class="w-20 h-20 rounded-full ring-4 ring-slate-800 shadow-xl" alt="Sarah Johnson">
                                    <div
                                        class="absolute bottom-0 right-0 w-5 h-5 bg-green-500 rounded-full border-4 border-slate-900">
                                    </div>
                                </div>

                                <!-- Info -->
                                <div class="flex-1">
                                    <div class="flex items-start justify-between mb-3">
                                        <div>
                                            <h3 class="text-lg font-bold text-white mb-1">{{$condidat->first_name }}
                                                {{ $condidat->last_name }}</h3>
                                            <p class="text-sm text-blue-400 font-medium mb-2">{{ $condidat->specialty }}
                                            </p>
                                        </div>

                                        <div class="flex gap-2">
                                            <button
                                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium shadow-lg shadow-blue-500/30 transition-all">
                                                View Profile
                                            </button>
                                            <button
                                                class="w-10 h-10 rounded-lg bg-slate-800 border border-slate-700 hover:border-blue-500 text-slate-400 hover:text-white transition-all flex items-center justify-center">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Summary -->
                                    <p class="text-sm text-slate-400 line-clamp-2">
                                        {{ $condidat->bio  }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

        </div>
    </div>
</x-app-layout>