<x-app-layout>

    <div class="min-h-screen bg-black text-zinc-300 py-10 font-sans">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1">
                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 sticky top-24">

                        <div class="flex flex-col items-center text-center">
                            <div class="relative mb-4">
                                <img src="https://ui-avatars.com/api/?name=User+Name&background=18181b&color=ef4444"
                                    class="w-28 h-28 rounded-full border-4 border-zinc-950 shadow-lg object-cover">
                                <div
                                    class="absolute bottom-0 right-0 w-5 h-5 bg-green-500 border-4 border-zinc-900 rounded-full">
                                </div>
                            </div>

                            <h1 class="text-xl font-bold text-white">{{ $user -> first_name }} {{ $user -> last_name }}</h1>
                            <p class="text-red-500 font-medium text-sm mt-1">Full Stack Engineer</p>
                        </div>

                        <div class="mt-6 w-full">
                            <button
                                class="w-full group bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-red-600/20 hover:shadow-red-600/40 transition-all duration-300 flex items-center justify-center gap-3">
                                <svg class="w-5 h-5 transform group-hover:rotate-90 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Connect</span>
                            </button>
                        </div>

                        <div class="h-px bg-zinc-800 w-full my-6"></div>

                        <div class="space-y-4">
                            <div class="flex items-center gap-3 text-sm text-zinc-400">
                                <div class="p-2 bg-zinc-950 rounded-lg border border-zinc-800">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span>{{ $user -> email }}</span>
                            </div>
                        </div>

                        <div class="mt-6 bg-zinc-950 p-4 rounded-xl border border-zinc-800">
                            <p class="text-xs text-zinc-500 leading-relaxed">
                                @if ($user -> bio )
                                {{ $user -> bio }}
                                
                                @else
                                
                                NO BIO

                                @endif

                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-bold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Experience
                            </h2>
                        </div>

                        <div class="space-y-4">
                            <div
                                class="group flex flex-col sm:flex-row sm:items-start justify-between p-4 bg-zinc-950 border border-zinc-800 rounded-xl hover:border-red-900/50 transition-colors">
                                <div>
                                    <h3 class="font-bold text-white group-hover:text-red-500 transition-colors">Senior
                                        Laravel Developer</h3>
                                    <p class="text-sm text-zinc-400 mt-1">Tech Solutions Inc.</p>
                                    <p class="text-xs text-zinc-500 mt-2">Developing high performance APIs and managing
                                        database optimization.</p>
                                </div>
                                <div class="mt-2 sm:mt-0">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-900/20 text-red-400 border border-red-900/30">
                                        2022 - Present
                                    </span>
                                </div>
                            </div>

                            <div
                                class="group flex flex-col sm:flex-row sm:items-start justify-between p-4 bg-zinc-950 border border-zinc-800 rounded-xl hover:border-red-900/50 transition-colors">
                                <div>
                                    <h3 class="font-bold text-white group-hover:text-red-500 transition-colors">Junior
                                        Web Developer</h3>
                                    <p class="text-sm text-zinc-400 mt-1">Creative Agency</p>
                                    <p class="text-xs text-zinc-500 mt-2">Worked on frontend interfaces using Vue.js and
                                        Tailwind CSS.</p>
                                </div>
                                <div class="mt-2 sm:mt-0">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-800 text-zinc-400 border border-zinc-700">
                                        2020 - 2022
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-bold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                Recent Projects
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div
                                class="bg-zinc-950 p-4 rounded-xl border border-zinc-800 hover:border-red-600 transition-colors cursor-pointer group">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="p-2 bg-zinc-900 rounded-lg">
                                        <svg class="w-6 h-6 text-zinc-400 group-hover:text-white" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    </div>
                                    <svg class="w-4 h-4 text-zinc-600 group-hover:text-red-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-white text-sm">E-commerce API</h3>
                                <p class="text-xs text-zinc-500 mt-1">Laravel, Sanctum, Stripe</p>
                            </div>

                            <div
                                class="bg-zinc-950 p-4 rounded-xl border border-zinc-800 hover:border-red-600 transition-colors cursor-pointer group">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="p-2 bg-zinc-900 rounded-lg">
                                        <svg class="w-6 h-6 text-zinc-400 group-hover:text-white" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <svg class="w-4 h-4 text-zinc-600 group-hover:text-red-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-white text-sm">CRM Dashboard</h3>
                                <p class="text-xs text-zinc-500 mt-1">Livewire, Tailwind, Charts</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>