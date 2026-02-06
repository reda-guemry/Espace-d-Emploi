<div class="min-h-screen bg-zinc-950 text-zinc-300 font-sans selection:bg-red-500/30">

    <header class="border-b border-zinc-800 bg-zinc-900/50 backdrop-blur-md sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-6">
            
            <div class="font-bold text-2xl text-white tracking-tighter">
                Job<span class="text-red-600">Match</span>
            </div>

            <div class="flex-1 max-w-2xl">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-zinc-500 group-focus-within:text-red-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" 
                        class="block w-full pl-11 pr-4 py-3 bg-zinc-900 border border-zinc-800 rounded-xl leading-5 text-zinc-300 placeholder-zinc-500 focus:outline-none focus:bg-black focus:border-red-600 focus:ring-1 focus:ring-red-600 sm:text-sm transition-all shadow-lg" 
                        placeholder="Search for jobs, companies, or keywords...">
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="h-10 w-10 rounded-full bg-gradient-to-tr from-red-600 to-red-900 border border-white/10"></div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <div class="lg:col-span-4 space-y-6">
                <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-16 -mt-16 w-32 h-32 rounded-full bg-red-600/20 blur-3xl"></div>

                    <div class="flex flex-col items-center text-center">
                        <div class="h-28 w-28 rounded-full p-1 bg-zinc-800 border border-zinc-700 mb-4">
                            <img src="https://ui-avatars.com/api/?name=User+Name&background=18181b&color=ef4444" alt="Profile" class="h-full w-full rounded-full object-cover">
                        </div>
                        <h1 class="text-2xl font-bold text-white">Alex Developer</h1>
                        <p class="text-red-500 font-medium">Full Stack Engineer</p>
                        
                        <div class="mt-6 w-full text-left space-y-4">
                            <div>
                                <h3 class="text-xs font-bold text-zinc-500 uppercase tracking-wider mb-2">Bio</h3>
                                <p class="text-sm leading-relaxed text-zinc-400">
                                    Passionate developer with 5 years of experience building scalable web applications. I love clean code, dark themes, and solving complex problems with Laravel & Livewire.
                                </p>
                            </div>
                            
                            <div class="pt-4 border-t border-zinc-800">
                                <div class="flex items-center gap-2 text-sm text-zinc-400 mb-2">
                                    <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    Casablanca, Morocco
                                </div>
                                <div class="flex items-center gap-2 text-sm text-zinc-400">
                                    <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    alex@example.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 space-y-8">

                <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-8">
                    <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <span class="w-1 h-6 bg-red-600 rounded-full"></span>
                        Professional Experience
                    </h2>

                    <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-zinc-700 before:to-transparent">
                        
                        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-zinc-700 bg-zinc-950 group-hover:border-red-500 transition-colors shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                <div class="w-3 h-3 bg-red-600 rounded-full"></div>
                            </div>
                            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-black p-4 rounded-xl border border-zinc-800 shadow-lg">
                                <div class="flex justify-between items-start mb-1">
                                    <h3 class="font-bold text-white">Senior Laravel Dev</h3>
                                    <span class="text-xs text-zinc-500 bg-zinc-900 px-2 py-1 rounded">2022 - Present</span>
                                </div>
                                <p class="text-sm text-zinc-400">TechCorp Solutions</p>
                                <p class="text-xs text-zinc-500 mt-2">Leading the backend team and optimizing database queries.</p>
                            </div>
                        </div>

                        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-zinc-700 bg-zinc-950 shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                <div class="w-3 h-3 bg-zinc-600 rounded-full"></div>
                            </div>
                            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-black p-4 rounded-xl border border-zinc-800 shadow-lg">
                                <div class="flex justify-between items-start mb-1">
                                    <h3 class="font-bold text-white">Web Developer</h3>
                                    <span class="text-xs text-zinc-500 bg-zinc-900 px-2 py-1 rounded">2020 - 2022</span>
                                </div>
                                <p class="text-sm text-zinc-400">Digital Agency</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-8">
                    <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <span class="w-1 h-6 bg-red-600 rounded-full"></span>
                        Recent Work
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="group relative bg-black border border-zinc-800 rounded-xl overflow-hidden hover:border-red-600/50 transition-all">
                            <div class="h-32 bg-zinc-800 w-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white text-sm">E-Commerce Platform</h3>
                                <p class="text-xs text-zinc-500 mt-1">Laravel, Vue.js, Stripe</p>
                            </div>
                        </div>

                        <div class="group relative bg-black border border-zinc-800 rounded-xl overflow-hidden hover:border-red-600/50 transition-all">
                            <div class="h-32 bg-zinc-800 w-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-white text-sm">SaaS Dashboard</h3>
                                <p class="text-xs text-zinc-500 mt-1">Livewire, Tailwind, MySQL</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>