<x-app-layout>
    <div class="min-h-screen bg-black text-gray-100 font-sans selection:bg-red-500 selection:text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

            <div
                class="bg-zinc-900 rounded-3xl border border-red-900/30 overflow-hidden shadow-2xl shadow-red-900/10 mb-8 relative group">

                <div class="h-48 bg-gradient-to-r from-red-950 via-black to-zinc-900 relative">
                    <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20">
                    </div>
                    <button
                        class="absolute top-4 right-4 bg-black/50 hover:bg-red-600 text-white p-2 rounded-full backdrop-blur-md transition-all opacity-0 group-hover:opacity-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </button>
                </div>

                <div class="px-8 pb-8">
                    <div class="flex flex-col md:flex-row items-end -mt-16 relative z-10">

                        <div class="relative">
                            <img class="w-36 h-36 rounded-3xl border-4 border-black shadow-2xl object-cover bg-zinc-800"
                                src="{{ asset('storage/profiles/' . $candidate->profile_photo) }}" alt="Profile">
                            <span
                                class="absolute bottom-2 right-2 w-5 h-5 bg-green-500 border-4 border-black rounded-full"></span>
                        </div>

                        <div
                            class="md:ml-6 mt-4 md:mt-0 flex-1 flex flex-col md:flex-row justify-between items-end md:items-center gap-4">
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-1 flex items-center gap-2">
                                    {{ $candidate->first_name }} {{ $candidate->last_name }}
                                    <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </h1>
                                <p class="text-red-500 font-medium text-lg">
                                    {{ $candidate->headline ?? 'Senior Software Engineer' }}
                                </p>
                                <p class="text-gray-500 text-sm flex items-center gap-1 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $candidate->city ?? 'Casablanca' }}, Morocco
                                </p>
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
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v9a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="truncate">{{ $candidate->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6 space-y-6">

                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-4 flex gap-4 items-center">
                        <img class="w-10 h-10 rounded-full bg-zinc-800"
                            src="{{ asset('storage/profiles/' . $candidate->profile_photo) }}">
                        <div
                            class="flex-1 bg-black border border-zinc-800 rounded-full px-4 py-2.5 text-gray-500 cursor-pointer hover:bg-zinc-950 hover:border-red-900/50 transition">
                            Start a post, {{ $candidate->first_name }}?
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-gray-500 text-sm px-2">
                        <span>Latest Offers</span>
                        <div class="h-px bg-zinc-800 flex-1 ml-4"></div>
                    </div>

                    <div class="mt-4">
                        <livewire:show-vacancies />
                    </div>
                </div>

                <div class="hidden lg:block lg:col-span-3 space-y-6 sticky top-6">

                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/5">
                        <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/10">

                            <div class="flex items-center gap-2 mb-6">
                                <div class="w-1 h-6 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                                <h3 class="font-bold text-white">Invitation Request</h3>
                                <span
                                    class="ml-auto bg-zinc-800 text-zinc-400 text-xs px-2 py-0.5 rounded-full border border-zinc-700">
                                    {{ $invitationsConnect->count() }}
                                </span>
                            </div>

                            <div class="space-y-4">
                                @forelse($invitationsConnect as $invitation)

                                    <div
                                        class="relative bg-zinc-950 border border-zinc-800 rounded-xl p-4 group hover:border-red-900/30 transition-all">

                                        <a href="{{ $invitation->sender->publicProfilUrl }}"
                                            class="absolute top-3 right-3 text-zinc-600 hover:text-white transition-colors"
                                            title="View Profile">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                        </a>

                                        <div class="flex items-center gap-3 mb-4">
                                            <img src="{{ asset('storage/profiles/' . $invitation->sender->profile_photo) }}"
                                                class="w-10 h-10 rounded-full border border-zinc-700 object-cover">
                                            <div>
                                                <h4 class="font-bold text-white text-sm leading-tight">
                                                    {{ $invitation->sender->first_name }}
                                                    {{ $invitation->sender->last_name }}
                                                </h4>
                                                <p class="text-xs text-zinc-500 mt-0.5">
                                                    {{ $invitation->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex gap-2">

                                            <form action="{{ route('connection.accepte', $invitation->id) }}"
                                                method="POST" class="flex-1">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-lg transition-colors shadow-lg shadow-red-900/20">
                                                    Accept
                                                </button>
                                            </form>

                                            <form action="{{ route('connection.refuse', $invitation->id) }}" method="POST"
                                                class="flex-1"> @csrf
                                                @csrf
                                                <button type="submit"
                                                    class="w-full py-1.5 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 hover:text-white text-xs font-bold rounded-lg border border-zinc-700 transition-colors">
                                                    Refuse
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                @empty
                                    <div class="text-center py-4">
                                        <p class="text-zinc-500 text-sm">No new requests.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
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