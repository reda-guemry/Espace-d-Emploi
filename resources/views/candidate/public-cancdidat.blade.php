<x-app-layout>

    <div class="min-h-screen bg-black text-zinc-300 py-10 font-sans">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1">
                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 sticky top-24">

                        <div class="flex flex-col items-center text-center">
                            <div class="relative mb-4">
                                <img src="{{ asset('storage/profiles/' . $user->profile_photo) }}"
                                    class="w-28 h-28 rounded-full border-4 border-zinc-950 shadow-lg object-cover">
                                <div
                                    class="absolute bottom-0 right-0 w-5 h-5 bg-green-500 border-4 border-zinc-900 rounded-full">
                                </div>
                            </div>

                            <h1 class="text-xl font-bold text-white">{{ $user->first_name }} {{ $user->last_name }}
                            </h1>
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

                        <div class="mt-6 bg-zinc-950 p-4 rounded-xl border border-zinc-800">
                            <p class="text-xs text-zinc-500 leading-relaxed">
                                @if ($user->bio)
                                    {{ $user->bio }}

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
                            @foreach ($user->experiences as $experience)
                                <div
                                    class="group flex flex-col sm:flex-row sm:items-start justify-between p-4 bg-zinc-950 border border-zinc-800 rounded-xl hover:border-red-900/50 transition-colors">
                                    <div>
                                        <h3 class="font-bold text-white group-hover:text-red-500 transition-colors">
                                            {{ $experience->position }}
                                        </h3>
                                        <p class="text-sm text-zinc-400 mt-1">{{ $experience->company_name }}</p>
                                        <p class="text-xs text-zinc-500 mt-2">{{ $experience->description }}.</p>
                                    </div>
                                    <div class="mt-2 sm:mt-0">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-900/20 text-red-400 border border-red-900/30">
                                            {{ $experience->start_date }} - {{ $experience->end_date }}
                                        </span>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>

                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-bold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                Education
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            @foreach ($user->educations as $education)
                                <div
                                    class="relative group bg-zinc-950 p-5 rounded-2xl border border-zinc-800 hover:border-red-600/50 hover:bg-zinc-900/50 transition-all duration-300 cursor-pointer overflow-hidden shadow-lg hover:shadow-red-900/10">

                                    {{-- Decorative top gradient line (Animated) --}}
                                    <div
                                        class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-red-600 to-red-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                                    </div>

                                    <div class="flex justify-between items-start mb-4">
                                        {{-- Icon Container --}}
                                        <div
                                            class="p-3 bg-zinc-900 rounded-xl border border-zinc-800 group-hover:bg-red-600 group-hover:border-red-500 transition-all duration-300">
                                            {{-- Academic Cap Icon --}}
                                            <svg class="w-6 h-6 text-zinc-400 group-hover:text-white transition-colors duration-300"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                <path
                                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                            </svg>
                                        </div>

                                        {{-- Date Badge --}}
                                        <div
                                            class="flex items-center gap-1.5 px-3 py-1 bg-zinc-900 rounded-full border border-zinc-800 group-hover:border-zinc-700 transition-colors">
                                            <svg class="w-3.5 h-3.5 text-zinc-500 group-hover:text-red-500 transition-colors"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span
                                                class="text-xs font-semibold text-zinc-400 group-hover:text-zinc-300 transition-colors">
                                                {{ $education->start_date }} - {{ $education->end_date }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Content --}}
                                    <div>
                                        <h3
                                            class="font-bold text-white text-lg leading-tight group-hover:text-red-500 transition-colors duration-300">
                                            {{ $education->degree }}
                                        </h3>

                                        <p class="text-sm font-medium text-zinc-400 mt-1 flex items-center gap-2">
                                            <span
                                                class="w-1.5 h-1.5 rounded-full bg-red-600 group-hover:animate-pulse"></span>
                                            {{ $education->school }}
                                        </p>

                                        {{-- Description --}}
                                        @if($education->description)
                                            <p
                                                class="text-xs text-zinc-500 mt-3 line-clamp-2 leading-relaxed group-hover:text-zinc-400 transition-colors">
                                                {{ $education->description }}
                                            </p>
                                        @endif
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