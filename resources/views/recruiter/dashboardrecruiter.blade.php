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
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Search by Name</label>
                        <div class="relative">
                            <input type="text" placeholder="Search candidates..." class="w-full  bg-slate-800/60 border border-slate-700  placeholder-slate-500 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        </div>
                    </div>

                    <!-- Filter by Category -->
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Category</label>
                        <div class="relative">
                            <select class="w-full bg-slate-800/60 border border-slate-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none cursor-pointer">
                                <option value="">All Categories</option>
                                <option value="developer">Developer</option>
                                <option value="designer">Designer</option>
                                <option value="marketing">Marketing</option>
                                <option value="sales">Sales</option>
                                <option value="management">Management</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-slate-900/80 backdrop-blur-xl rounded-xl shadow-lg border border-slate-800 p-5 hover:border-blue-500/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Total Candidates</p>
                            <h3 class="text-2xl font-bold text-white mt-1">248</h3>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center border border-blue-500/20">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-xl rounded-xl shadow-lg border border-slate-800 p-5 hover:border-blue-500/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Shortlisted</p>
                            <h3 class="text-2xl font-bold text-white mt-1">32</h3>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center border border-green-500/20">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-xl rounded-xl shadow-lg border border-slate-800 p-5 hover:border-blue-500/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Interviewed</p>
                            <h3 class="text-2xl font-bold text-white mt-1">18</h3>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center border border-purple-500/20">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-xl rounded-xl shadow-lg border border-slate-800 p-5 hover:border-blue-500/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Hired</p>
                            <h3 class="text-2xl font-bold text-white mt-1">12</h3>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center border border-orange-500/20">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Candidates List -->
            <div class="bg-slate-900/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
                <div class="p-6 border-b border-slate-800 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-white">All Candidates</h2>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-slate-400">Showing 1-10 of 248</span>
                        <div class="flex gap-1">
                            <button class="w-8 h-8 rounded-lg bg-slate-800 border border-slate-700 text-slate-400 hover:bg-slate-700 hover:text-white transition-all flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button class="w-8 h-8 rounded-lg bg-blue-600 border border-blue-500 text-white hover:bg-blue-700 transition-all flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                


            </div>

        </div>
    </div>
</x-app-layout>