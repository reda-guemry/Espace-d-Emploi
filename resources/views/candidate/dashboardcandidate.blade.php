<x-app-layout>
    <div class="min-h-screen bg-slate-950 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-black">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-12">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <div class="hidden lg:block lg:col-span-2 space-y-6 sticky top-6">
                    <nav class="space-y-2">
                        <a href="#" class="flex flex-col items-center gap-2 p-4 bg-slate-900/50 hover:bg-slate-800 border border-slate-800 rounded-2xl transition-all group">
                            <div class="w-10 h-10 rounded-xl bg-blue-600/10 text-blue-500 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <span class="text-xs font-bold text-slate-400 group-hover:text-white">Profile</span>
                        </a>
                        
                        <a href="#" class="flex flex-col items-center gap-2 p-4 hover:bg-slate-800 border border-transparent hover:border-slate-800 rounded-2xl transition-all group">
                            <div class="w-10 h-10 rounded-xl bg-slate-800 text-slate-500 flex items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <span class="text-xs font-bold text-slate-500 group-hover:text-white">Jobs</span>
                        </a>
                    </nav>
                </div>

                <div class="lg:col-span-6 space-y-6">

                    <div class="bg-slate-900 rounded-3xl shadow-2xl shadow-black/50 border border-slate-800 overflow-hidden relative">
                        <div class="h-40 bg-gradient-to-r from-blue-900 via-indigo-900 to-slate-900 relative">
                             <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAzNHYtNGgtMnY0aC0ydjRoMnY0aDJ2LTRoMnYtNGgtMnpNMzYgMzRWMzBoNDB2NGgtNDB6IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz48L2c+PC9zdmc+')]"></div>
                        </div>
                        
                        <div class="px-8 pb-8 text-center relative">
                            <div class="relative inline-block -mt-20 mb-6">
                                <div class="p-1.5 rounded-full bg-slate-900">
                                    <img class="w-36 h-36 rounded-full border-4 border-slate-800 shadow-2xl object-cover" src="{{ asset('storage/profiles/' . $candidate -> profile_photo ) }}" alt="Profile">
                                </div>
                                <div class="absolute bottom-5 right-3 bg-emerald-500 w-6 h-6 rounded-full border-4 border-slate-900 shadow-lg flex items-center justify-center">
                                    <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                </div>
                            </div>
                            
                            <h2 class="text-3xl font-bold text-white mb-2">{{ $candidate -> first_name }} {{ $candidate -> last_name }}</h2>
                            <p class="text-lg text-blue-400 mb-6 font-medium">{{ $candidate -> role }}</p>
                            
                            <div class="flex items-center justify-center gap-4">
                                <button class="flex-1 bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3 rounded-xl transition-all shadow-lg shadow-blue-900/40">
                                    Connect
                                </button>
                                <button class="flex-1 bg-slate-800 hover:bg-slate-700 text-white border border-slate-700 font-semibold py-3 rounded-xl transition-all">
                                    Message
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-900 rounded-3xl border border-slate-800 p-8">
                        <h3 class="text-white font-bold text-xl mb-4">About</h3>
                        <p class="text-slate-400 leading-relaxed">
                            Experienced developer with a focus on Laravel and Vue.js...
                        </p>
                    </div>

                </div>

                <div class="lg:col-span-4 space-y-6">
                    
                    <div class="bg-slate-900 rounded-3xl shadow-xl shadow-black/20 border border-slate-800 p-6 sticky top-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-bold text-white text-base tracking-wide flex items-center gap-2">
                                People Also Viewed
                            </h3>
                        </div>

                        <form method="GET"  action="{{ route('dashboard') }}" class="mb-6" >
                            <div>
                                <label class="block text-sm font-medium text-slate-300 mb-2">Search by Name</label>
                                <div class="relative">

                                    <input type="text" name="search" placeholder="Search candidates..."
                                        class="w-full  bg-slate-800/60 border border-slate-700  placeholder-slate-500 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                </div>
                            </div>

                        </form>
                        
                        <div class="space-y-4">
                            
                            @foreach($users as $user ) 

                                <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-slate-800/50 border border-transparent hover:border-slate-700/50 transition-all cursor-pointer group">
                                    <img src="{{ asset('storage/profiles/' . $user -> profile_photo) }}" class="w-14 h-14 rounded-full ring-2 ring-slate-800 group-hover:ring-blue-500/50 transition-all object-cover">
                                    
                                    <div class="flex-1 min-w-0">
                                        <div class="flex justify-between items-start">
                                            <h4 class="text-base font-bold text-white truncate group-hover:text-blue-400 transition-colors">{{$user -> first_name}} {{$user -> last_name}}</h4>
                                            <button class="text-slate-500 hover:text-white transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                                            </button>
                                        </div>
                                        <p class="text-sm text-slate-400 truncate">{{ $user -> specialty }}</p>
                                        
                                        <button class="mt-3 w-full py-1.5 rounded-lg border border-slate-700 text-xs font-semibold text-slate-300 hover:bg-blue-600 hover:border-blue-600 hover:text-white transition-all">
                                            Connect
                                        </button>
                                    </div>
                                </div>

                            @endforeach

                            

                        </div>
                        
                        <a href="#" class="block mt-6 pt-4 border-t border-slate-800 text-center text-sm text-blue-500 font-semibold hover:text-blue-400 transition-colors">
                            View All Suggestions
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>