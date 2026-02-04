<x-app-layout>
    <div class="min-h-screen bg-black text-gray-100 font-sans selection:bg-red-500 selection:text-white">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

            <div class="bg-zinc-900 rounded-3xl border border-red-900/30 overflow-hidden shadow-2xl shadow-red-900/10 mb-8 relative group">
                
                <div class="h-48 bg-gradient-to-r from-red-950 via-black to-zinc-900 relative">
                    <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
                    <button class="absolute top-4 right-4 bg-black/50 hover:bg-red-600 text-white p-2 rounded-full backdrop-blur-md transition-all opacity-0 group-hover:opacity-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </button>
                </div>

                <div class="px-8 pb-8">
                    <div class="flex flex-col md:flex-row items-end -mt-16 relative z-10">
                        
                        <div class="relative">
                            <img class="w-36 h-36 rounded-3xl border-4 border-black shadow-2xl object-cover bg-zinc-800" 
                                 src="{{ asset('storage/profiles/' . $candidate->profile_photo) }}" 
                                 alt="Profile">
                            <span class="absolute bottom-2 right-2 w-5 h-5 bg-green-500 border-4 border-black rounded-full"></span>
                        </div>

                        <div class="md:ml-6 mt-4 md:mt-0 flex-1 flex flex-col md:flex-row justify-between items-end md:items-center gap-4">
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-1 flex items-center gap-2">
                                    {{ $candidate->first_name }} {{ $candidate->last_name }}
                                    <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </h1>
                                <p class="text-red-500 font-medium text-lg">{{ $candidate->headline ?? 'Senior Software Engineer' }}</p>
                                <p class="text-gray-500 text-sm flex items-center gap-1 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $candidate->city ?? 'Casablanca' }}, Morocco
                                </p>
                            </div>

                            <div class="flex gap-3">
                                <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-red-600/20 transition-all flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Connect
                                </button>
                                <button class="bg-zinc-800 hover:bg-zinc-700 text-white px-6 py-2.5 rounded-xl font-semibold border border-zinc-700 transition-all">
                                    Message
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                <div class="hidden lg:block lg:col-span-3 space-y-6 sticky top-6">
                    
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/5">
                        <h3 class="text-white font-bold text-lg mb-4 border-l-4 border-red-600 pl-3">Intro</h3>
                        
                        <div class="space-y-4 text-sm text-gray-400">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <span>Works at <strong class="text-white">Tech Solutions</strong></span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                                <span>Studied at <strong class="text-white">OFPPT</strong></span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v9a2 2 0 002 2z"></path></svg>
                                <span class="truncate">{{ $candidate->email }}</span>
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-zinc-800">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-500">Profile Views</span>
                                <span class="text-red-500 font-bold">1.2k</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Search Appearances</span>
                                <span class="text-red-500 font-bold">342</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6 space-y-6">
                    
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-4 flex gap-4 items-center">
                        <img class="w-10 h-10 rounded-full bg-zinc-800" src="{{ asset('storage/profiles/' . $candidate->profile_photo) }}">
                        <div class="flex-1 bg-black border border-zinc-800 rounded-full px-4 py-2.5 text-gray-500 cursor-pointer hover:bg-zinc-950 hover:border-red-900/50 transition">
                            Start a post, {{ $candidate->first_name }}?
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-gray-500 text-sm px-2">
                        <span>Latest Offers</span>
                        <div class="h-px bg-zinc-800 flex-1 ml-4"></div>
                    </div>

                    <div class="bg-zinc-900 rounded-2xl border border-red-900/20 p-6 shadow-lg hover:border-red-600/40 transition-all group">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex gap-4">
                                <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center overflow-hidden">
                                    <span class="font-bold text-black text-xl">L</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-white group-hover:text-red-500 transition">Senior Laravel Developer</h3>
                                    <p class="text-sm text-gray-400">Laracasts Inc. • Remote</p>
                                </div>
                            </div>
                            <button class="text-gray-500 hover:text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg></button>
                        </div>

                        <p class="text-gray-300 text-sm leading-relaxed mb-4">
                            We are looking for an experienced PHP developer to join our core team. You will be working on high-scale applications...
                            <span class="text-red-500 cursor-pointer hover:underline">Read more</span>
                        </p>

                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="px-3 py-1 rounded-full bg-red-900/20 text-red-400 text-xs font-medium border border-red-900/30">PHP</span>
                            <span class="px-3 py-1 rounded-full bg-red-900/20 text-red-400 text-xs font-medium border border-red-900/30">Laravel</span>
                            <span class="px-3 py-1 rounded-full bg-red-900/20 text-red-400 text-xs font-medium border border-red-900/30">Vue.js</span>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-zinc-800">
                            <span class="text-xs text-gray-500">Posted 2 days ago</span>
                            <div class="flex gap-3">
                                <button class="text-gray-400 hover:text-white text-sm font-medium">Save</button>
                                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded-lg text-sm font-bold shadow-lg shadow-red-600/20 transition">Apply Now</button>
                            </div>
                        </div>
                    </div>
                    </div>

                <div class="hidden lg:block lg:col-span-3 space-y-6 sticky top-6">
                    
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/5">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-white font-bold text-base">Friends</h3>
                            <a href="#" class="text-xs text-red-500 hover:text-red-400">See All</a>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-3">
                            @foreach(range(1, 9) as $index)
                            <div class="group relative aspect-square">
                                <div class="w-full h-full rounded-xl bg-zinc-800 border border-zinc-700 group-hover:border-red-500 transition-all flex items-center justify-center cursor-pointer overflow-hidden">
                                    <span class="text-gray-500 font-bold group-hover:text-white">FR</span>
                                    </div>
                                @if($index % 2 == 0)
                                <span class="absolute bottom-1 right-1 w-2.5 h-2.5 bg-green-500 border-2 border-zinc-900 rounded-full"></span>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <button class="w-full mt-6 py-2 bg-zinc-800 hover:bg-zinc-700 text-gray-300 text-sm font-semibold rounded-xl transition-all border border-zinc-700">
                            View Requests (2)
                        </button>
                    </div>

                    <div class="flex flex-wrap gap-x-4 gap-y-2 text-xs text-gray-600 px-2 justify-center">
                        <a href="#" class="hover:text-red-500">About</a>
                        <a href="#" class="hover:text-red-500">Accessibility</a>
                        <a href="#" class="hover:text-red-500">Help Center</a>
                        <span>© 2024 Corporate</span>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>