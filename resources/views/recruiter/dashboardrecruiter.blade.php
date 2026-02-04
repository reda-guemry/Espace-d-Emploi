<x-app-layout>
    
    <div class="min-h-screen bg-black">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                <!-- Left Sidebar -->
                <aside class="lg:col-span-3 space-y-6">
                    
                    <!-- Profile Card -->
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 overflow-hidden shadow-lg shadow-red-900/10">
                        <!-- Cover Image -->
                        <div class="h-24 bg-gradient-to-r from-red-900 via-red-800 to-black relative">
                            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAzNHYtNGgtMnY0aC0ydjRoMnY0aDJ2LTRoMnYtNGgtMnpNMzYgMzRWMzBoNDB2NGgtNDB6IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz48L2c+PC9zdmc+')] opacity-20"></div>
                        </div>
                        
                        <!-- Profile Info -->
                        <div class="px-6 pb-6 text-center -mt-12">
                            {{-- <div class="relative inline-block mb-4">
                                <img 
                                    class="w-24 h-24 rounded-full border-4 border-zinc-900 mx-auto object-cover shadow-xl" 
                                    src="{{ asset('storage/profiles/' . $candidates->profile_photo) }}" 
                                    alt="Profile"
                                >
                                <div class="absolute bottom-2 right-2 bg-red-600 w-4 h-4 rounded-full border-4 border-zinc-900 animate-pulse"></div>
                            </div>
                            
                            <h3 class="font-bold text-white text-lg mb-1">{{ $candidates->first_name }} {{ $candidates->last_name }}</h3>
                            <p class="text-sm text-gray-400 mb-1">{{ $candidates->role }}</p>
                            <p class="text-xs text-gray-600 mb-4">{{ $candidates->location ?? 'Morocco' }}</p>
                            
                            <!-- Stats -->
                            <div class="grid grid-cols-3 gap-4 mb-6">
                                <div class="text-center">
                                    <div class="text-xl font-bold text-white">{{ $candidates->connections_count ?? 0 }}</div>
                                    <div class="text-xs text-gray-500">Connections</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-white">{{ $candidates->followers_count ?? 156 }}</div>
                                    <div class="text-xs text-gray-500">Followers</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-white">{{ $candidates->following_count ?? 142 }}</div>
                                    <div class="text-xs text-gray-500">Following</div>
                                </div>
                            </div> --}}
                            
                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <button class="flex-1 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-sm font-semibold rounded-xl transition-all shadow-lg shadow-red-900/50">
                                    Follow
                                </button>
                                <button class="px-4 py-2.5 bg-zinc-800 hover:bg-zinc-700 border border-red-900/30 text-gray-300 rounded-xl transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-4 shadow-lg shadow-red-900/10">
                        <nav class="space-y-1">
                            <a href="#timeline" class="flex items-center gap-3 px-4 py-3 bg-red-600 text-white rounded-xl font-medium transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Timeline
                            </a>
                            <a href="#about" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:bg-zinc-800 hover:text-white rounded-xl font-medium transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                About
                            </a>
                            <a href="#friends" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:bg-zinc-800 hover:text-white rounded-xl font-medium transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Friends
                            </a>
                            <a href="#photos" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:bg-zinc-800 hover:text-white rounded-xl font-medium transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Photos
                            </a>
                        </nav>
                    </div>

                </aside>

                <!-- Main Content -->
                <main class="lg:col-span-6 space-y-6">
                    <livewire:user-sherch />
                    
                    <!-- About Section -->
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/10">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-1 h-6 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                            <h2 class="text-xl font-bold text-white">About</h2>
                        </div>
                        <p class="text-gray-400 leading-relaxed mb-4">
                            {{ $candidate->bio ?? 'Passionate developer with extensive experience in building scalable web applications. Expert in modern frameworks and always eager to learn new technologies.' }}
                        </p>
                        <button class="text-red-500 hover:text-red-400 text-sm font-medium">Show more</button>
                    </div>

                    <!-- Experience Section -->
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/10">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-2">
                                <div class="w-1 h-6 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                                <h2 class="text-xl font-bold text-white">Experience</h2>
                            </div>
                            <button class="text-red-500 hover:text-red-400 text-sm font-medium">+ Add</button>
                        </div>
                        
                        <div class="space-y-6">
                            @forelse($candidate->experiences ?? [] as $experience)
                            <div class="flex gap-4 group">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-zinc-800 border border-red-900/30 rounded-xl flex items-center justify-center group-hover:border-red-600 transition">
                                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-white mb-1">{{ $experience->title }}</h3>
                                    <p class="text-sm text-gray-400 mb-1">{{ $experience->company }}</p>
                                    <p class="text-xs text-gray-600">{{ $experience->start_date }} - {{ $experience->end_date ?? 'Present' }}</p>
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-600 text-center py-4">No experience added yet</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Education Section -->
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/10">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-2">
                                <div class="w-1 h-6 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                                <h2 class="text-xl font-bold text-white">Education</h2>
                            </div>
                            <button class="text-red-500 hover:text-red-400 text-sm font-medium">+ Add</button>
                        </div>
                        
                        <div class="space-y-6">
                            @forelse($candidate->educations ?? [] as $education)
                            <div class="flex gap-4 group">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-zinc-800 border border-red-900/30 rounded-xl flex items-center justify-center group-hover:border-red-600 transition">
                                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-white mb-1">{{ $education->degree }}</h3>
                                    <p class="text-sm text-gray-400 mb-1">{{ $education->school }}</p>
                                    <p class="text-xs text-gray-600">{{ $education->graduation_year }}</p>
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-600 text-center py-4">No education added yet</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Skills Section -->
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/10">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-2">
                                <div class="w-1 h-6 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                                <h2 class="text-xl font-bold text-white">Skills</h2>
                            </div>
                            <button class="text-red-500 hover:text-red-400 text-sm font-medium">+ Add</button>
                        </div>
                        
                        <div class="space-y-4">
                            @forelse($candidate->skills ?? [] as $skill)
                            <div class="flex items-center justify-between group">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="text-white font-medium">{{ $skill->name }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    @for($i = 1; $i <= 5; $i++)
                                    <div class="w-8 h-8 rounded-full {{ $i <= ($skill->level ?? 4) ? 'bg-red-600' : 'bg-zinc-800' }} border border-red-900/30 flex items-center justify-center">
                                        @if($i <= ($skill->level ?? 4))
                                        <img src="https://ui-avatars.com/api/?name={{ $i }}&background=DC2626&color=fff&size=32" class="w-6 h-6 rounded-full" alt="">
                                        @endif
                                    </div>
                                    @endfor
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-600 text-center py-4">No skills added yet</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Suggestions Section -->
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/10">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-2">
                                <div class="w-1 h-6 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                                <h2 class="text-xl font-bold text-white">Suggestions</h2>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            @foreach(range(1, 2) as $index)
                            <div class="bg-zinc-800 border border-red-900/30 rounded-xl p-4 text-center hover:border-red-600 transition">
                                <img src="https://ui-avatars.com/api/?name=User{{ $index }}&background=DC2626&color=fff" class="w-16 h-16 rounded-full mx-auto mb-3 border-2 border-red-600" alt="">
                                <h4 class="font-bold text-white text-sm mb-1">Person {{ $index }}</h4>
                                <p class="text-xs text-gray-500 mb-3">Developer</p>
                                <button class="w-full py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-xs font-semibold rounded-lg transition-all">
                                    Follow
                                </button>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </main>

                <!-- Right Sidebar -->
                <aside class="lg:col-span-3 space-y-6">
                    
                    <!-- Latest Activity -->
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/10">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-1 h-6 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                            <h3 class="font-bold text-white">Latest Activity</h3>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach(range(1, 3) as $index)
                            <div class="flex items-start gap-3 pb-4 border-b border-red-900/20 last:border-0">
                                <img src="https://ui-avatars.com/api/?name=User{{ $index }}&background=DC2626&color=fff" class="w-10 h-10 rounded-full border-2 border-red-600" alt="">
                                <div class="flex-1">
                                    <p class="text-sm text-gray-300 mb-1"><span class="font-semibold text-white">Person {{ $index }}</span> liked your post</p>
                                    <p class="text-xs text-gray-600">{{ rand(1, 60) }} minutes ago</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Friends/Connections -->
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-2">
                                <div class="w-1 h-6 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                                <h3 class="font-bold text-white">Friends ({{ $candidate->connections_count ?? 0 }})</h3>
                            </div>
                            <button class="text-red-500 hover:text-red-400 text-sm">See All</button>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-3">
                            @foreach(range(1, 9) as $index)
                            <div class="group">
                                <img src="https://ui-avatars.com/api/?name=Friend{{ $index }}&background=DC2626&color=fff" class="w-full aspect-square rounded-xl object-cover border-2 border-zinc-800 group-hover:border-red-600 transition cursor-pointer" alt="">
                            </div>
                            @endforeach
                        </div>
                        
                        <button class="w-full mt-4 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-sm font-semibold rounded-xl transition-all shadow-lg shadow-red-900/50">
                            View All Friends
                        </button>
                    </div>

                </aside>

            </div>
        </div>
    </div>

</x-app-layout>