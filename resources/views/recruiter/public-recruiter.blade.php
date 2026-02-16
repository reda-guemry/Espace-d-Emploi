<x-app-layout>

    <div class="min-h-screen bg-black text-zinc-300 py-10 font-sans">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1">
                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 sticky top-24">

                        <div class="flex flex-col items-center text-center">
                            <div class="relative mb-4">
                                <img src="{{ asset('storage/profiles/' . $user->profile_photo) }}"
                                    class="w-32 h-32 rounded-full border-4 border-zinc-950 shadow-lg object-cover">
                                <div
                                    class="absolute bottom-1 right-1 bg-red-600 p-1.5 rounded-full border-4 border-zinc-900">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>

                            <h1 class="text-2xl font-bold text-white">{{ $user->first_name  }} {{  $user->last_name }}
                            </h1>
                            <p class="text-red-500 font-medium text-sm mt-1">Senior Talent Acquisition</p>


                        </div>

                        <div class="mt-6 w-full">
                            @if (!$connection)
                                <form action="{{ route('connection.store', $user->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="w-full py-2.5 px-4 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-red-900/20 flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                        Connect
                                    </button>
                                </form>

                            @elseif ($connection->status === 'pending')
                                <a href="#"
                                    class="w-full py-2.5 px-4 bg-yellow-600/20 text-yellow-500 border border-yellow-600/50 text-sm font-bold rounded-xl transition-all flex items-center justify-center gap-2 cursor-not-allowed">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Pending
                                </a>

                            @elseif ($connection->status === 'accepted')
                                <a href="#"
                                    class="w-full py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-blue-900/20 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                    Message
                                </a>
                            @endif
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
                                <span>{{ $user->email }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                        <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            About The Company
                        </h2>
                        <p class="text-sm text-zinc-400 leading-relaxed">
                            @if ($user->bio)
                                {{ $user->bio }}
                            @else
                                No Descruption
                            @endif
                        </p>
                    </div>

                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-bold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Jobs I'm Hiring For
                            </h2>
                        </div>

                        <div class="space-y-4">

                            @foreach($vacancies as $vacancy)


                                <div wire:key="{{ $vacancy->id }}"
                                    class="group relative bg-zinc-900 border border-zinc-800 hover:border-red-500/50 rounded-2xl p-5 transition-all duration-300 hover:shadow-xl hover:shadow-red-500/10 flex flex-col h-full">

                                    <div class="flex justify-between items-start mb-4">
                                        <div
                                            class="w-12 h-12 rounded-xl bg-zinc-800 flex items-center justify-center overflow-hidden border border-zinc-700 shadow-sm">
                                            @if($vacancy->image)
                                                <img src="{{ asset('storage/vacancy/' . $vacancy->image) }}"
                                                    alt="{{ $vacancy->title }}"
                                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <span
                                                    class="text-lg font-bold text-zinc-500">{{ substr($vacancy->title, 0, 1) }}</span>
                                            @endif
                                        </div>

                                        <span
                                            class="{{ $vacancy->status === 'open' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-red-500/10 text-red-400 border-red-500/20' }} text-xs font-medium px-2.5 py-1 rounded-full border flex items-center gap-1.5">
                                            <span
                                                class="w-1.5 h-1.5 rounded-full {{ $vacancy->status === 'open' ? 'bg-emerald-400 animate-pulse' : 'bg-red-400' }}"></span>
                                            {{ ucfirst($vacancy->status) }}
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h3
                                            class="text-lg font-bold text-white mb-2 group-hover:text-red-500 transition-colors line-clamp-1">
                                            {{ $vacancy->title }}
                                        </h3>

                                        <div class="flex flex-wrap gap-2 mb-4">
                                            <span
                                                class="px-2.5 py-1 bg-zinc-800 text-zinc-300 text-xs font-medium rounded-lg border border-zinc-700 flex items-center gap-1.5">
                                                <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                {{ $vacancy->contract_type }}
                                            </span>

                                            <span
                                                class="px-2.5 py-1 bg-zinc-800 text-zinc-300 text-xs font-medium rounded-lg border border-zinc-700 flex items-center gap-1.5">
                                                <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                {{ $vacancy->location }}
                                            </span>
                                        </div>

                                        <p class="text-zinc-400 text-sm leading-relaxed line-clamp-2 mb-4">
                                            {{ Str::limit($vacancy->description, 100) }}
                                        </p>
                                    </div>

                                    <div class="pt-4 border-t border-zinc-800 flex items-center justify-between mt-auto">
                                        <div class="text-xs text-zinc-500 flex flex-col">
                                            <span class="text-zinc-600 mb-0.5">Deadline</span>
                                            <span class="font-medium text-zinc-300 flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($vacancy->finish_at)->format('d M, Y') }}
                                            </span>
                                        </div>

                                        <a href="#"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-white text-black text-xs font-bold rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300">
                                            Apply Now
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>

</x-app-layout>