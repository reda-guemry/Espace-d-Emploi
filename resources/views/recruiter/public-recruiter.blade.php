<x-app-layout>


<div class="min-h-screen bg-black flex text-zinc-300 font-sans">
    
    <aside class="w-20 lg:w-64 bg-zinc-950 border-r border-zinc-800 flex flex-col justify-between py-6">
        <div class="px-4 lg:px-8">
            <div class="h-8 w-8 bg-red-600 rounded-lg flex items-center justify-center font-bold text-white text-xl shadow-lg shadow-red-900/40">
                R
            </div>
        </div>
        
        <nav class="space-y-4 px-2 lg:px-4">
            <a href="#" class="flex items-center gap-4 px-4 py-3 bg-zinc-900 rounded-xl text-white border border-zinc-800 hover:border-red-900/50 transition-all group">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span class="hidden lg:block font-medium">My Profile</span>
            </a>
            
            <a href="#" class="flex items-center gap-4 px-4 py-3 text-zinc-500 hover:text-white hover:bg-zinc-900/50 rounded-xl transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                <span class="hidden lg:block font-medium">Logout</span>
            </a>
        </nav>
        
        <div></div> </aside>

    <main class="flex-1 p-8 lg:p-12 flex items-center justify-center relative overflow-hidden">
        
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-900/5 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-xl w-full">
            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8 lg:p-12 shadow-2xl relative">
                
                <div class="absolute top-6 right-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="text-xs font-bold tracking-wider text-zinc-500 uppercase">Recruiter Account</span>
                </div>

                <div class="flex justify-center mb-8">
                    <div class="relative">
                        <div class="w-32 h-32 rounded-full p-1 bg-gradient-to-b from-zinc-700 to-zinc-900 border border-zinc-700 shadow-xl">
                            <img src="https://ui-avatars.com/api/?name=John+Recruiter&background=000&color=fff" class="w-full h-full rounded-full object-cover">
                        </div>
                        <div class="absolute bottom-1 right-1 bg-red-600 rounded-full p-2 border-4 border-zinc-900">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                    </div>
                </div>

                <div class="text-center space-y-2 mb-8">
                    <h1 class="text-3xl font-bold text-white tracking-tight">Mr. John Smith</h1>
                    <p class="text-red-500 font-medium tracking-wide">Senior Talent Acquisition</p>
                    <p class="text-zinc-500 text-sm">Google Inc.</p>
                </div>

                <div class="h-px w-full bg-zinc-800 mb-8"></div>

                <div class="space-y-4">
                    <label class="block text-xs font-bold text-zinc-600 uppercase tracking-widest text-center">About</label>
                    <p class="text-center text-zinc-400 leading-relaxed">
                        Professional recruiter specializing in tech roles. Dedicated to finding the best talent for high-growth environments. Focused on clear communication and efficient hiring processes.
                    </p>
                </div>

                <div class="mt-10 flex justify-center">
                    <button class="text-sm text-zinc-500 hover:text-white underline underline-offset-4 transition-colors">
                        Edit Profile Details
                    </button>
                </div>

            </div>
        </div>

    </main>
</div>  


</x-app-layout>