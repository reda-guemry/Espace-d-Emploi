<x-app-layout>

    {{--
    X-DATA: This initializes the Alpine.js state for the modal.
    Ensure Alpine.js is included in your project (it comes standard with Laravel Breeze/Jetstream).
    --}}
    <div x-data="{ showOfferModal: false }" class="min-h-screen bg-black relative">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <aside class="lg:col-span-3 space-y-6">

                    <div
                        class="bg-zinc-900 rounded-2xl border border-red-900/30 overflow-hidden shadow-lg shadow-red-900/10">
                        <div class="h-24 bg-gradient-to-r from-red-900 via-red-800 to-black relative">
                            <div
                                class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAzNHYtNGgtMnY0aC0ydjRoMnY0aDJ2LTRoMnYtNGgtMnpNMzYgMzRWMzBoNDB2NGgtNDB6IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz48L2c+PC9zdmc+')] opacity-20">
                            </div>
                        </div>

                        <div class="px-6 pb-6 text-center -mt-12">
                            <div class="relative inline-block mb-4">
                                <img class="w-24 h-24 rounded-full border-4 border-zinc-900 mx-auto object-cover shadow-xl"
                                    src="{{ asset('storage/profiles/' . ($recruteur->profile_photo ?? 'default.jpg')) }}"
                                    alt="Profile">
                                <div
                                    class="absolute bottom-2 right-2 bg-red-600 w-4 h-4 rounded-full border-4 border-zinc-900 animate-pulse">
                                </div>
                            </div>

                            <h3 class="font-bold text-white text-lg mb-1">{{ $recruteur->first_name ?? 'Recruiter' }}
                                {{ $recruteur->last_name ?? 'Name' }}
                            </h3>
                            </p>


                            <div class="flex flex-col gap-3">
                                {{-- NEW BUTTON: Add Offer --}}
                                <button @click="showOfferModal = true"
                                    class="w-full py-2.5 bg-gradient-to-r from-red-600 to-red-800 hover:from-red-500 hover:to-red-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-red-900/40 flex items-center justify-center gap-2 border border-red-500/20">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Post Vacancy
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-4 shadow-lg shadow-red-900/10">
                        <nav class="space-y-1">
                            <a href="#timeline"
                                class="flex items-center gap-3 px-4 py-3 bg-red-600/10 text-red-500 border border-red-900/30 rounded-xl font-medium transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                                My Vacancies
                            </a>
                        </nav>
                    </div>
                </aside>

                <main class="lg:col-span-6 space-y-6">
                    <div class="bg-zinc-900 rounded-2xl border border-red-900/30 p-6 shadow-lg shadow-red-900/10">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-1 h-6 bg-gradient-to-b from-red-600 to-red-800 rounded-full"></div>
                            <h2 class="text-xl font-bold text-white">Company Bio</h2>
                        </div>
                        <p class="text-gray-400 leading-relaxed mb-4">
                            {{ $recruteur->bio ?? 'We are a leading tech company looking for the best talents in the market. Join our team and build the future.' }}
                        </p>
                    </div>

                    <div class="space-y-4">
                        @if(session('succes'))
                            <div class="bg-green-500 text-white p-2 rounded">
                                {{ session('succes') }}
                            </div>
                        @endif

                        @foreach ($vacancies as $vacancy)

                            <div wire:key="{{ $vacancy->id }}"
                                class="group flex flex-col md:flex-row md:items-center justify-between p-4 bg-zinc-900 border border-zinc-800 rounded-xl hover:border-red-500/30 transition-all duration-300 hover:shadow-lg hover:shadow-red-900/5">

                                <div class="flex items-center gap-4 mb-4 md:mb-0 w-full md:w-auto">
                                    <div
                                        class="w-12 h-12 rounded-lg bg-zinc-800 flex items-center justify-center overflow-hidden border border-zinc-700 shrink-0">

                                        <img src="{{ asset('storage/vacancy/' . $vacancy->image) }}"
                                            class="w-full h-full object-cover">
                                    </div>

                                    <div class="flex-1">
                                        <h3
                                            class="text-white text-base font-bold group-hover:text-red-500 transition-colors line-clamp-1">
                                            {{ $vacancy->title }}
                                        </h3>

                                        <div class="flex items-center gap-3 text-xs text-zinc-500 mt-1">
                                            <span class="flex items-center gap-1.5">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                {{ $vacancy->location }}
                                            </span>
                                            <span class="hidden sm:inline w-1 h-1 rounded-full bg-zinc-700"></span>
                                            <span class="hidden sm:flex items-center gap-1.5">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($vacancy->created_at)->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center justify-between md:justify-end gap-6 w-full md:w-auto border-t border-zinc-800 pt-3 md:pt-0 md:border-t-0">

                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium border {{ $vacancy->status === 'open' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-red-500/10 text-red-400 border-red-500/20' }}">
                                        <span
                                            class="w-1.5 h-1.5 rounded-full {{ $vacancy->status === 'open' ? 'bg-emerald-400 animate-pulse' : 'bg-red-400' }}"></span>
                                        {{ ucfirst($vacancy->status) }}
                                    </span>

                                    <div class="hidden md:block w-px h-8 bg-zinc-800 mx-2"></div>

                                    <div class="flex flex-col items-end md:items-center min-w-[60px]">
                                        <span
                                            class="text-white font-bold text-sm">{{ $vacancy->applications_count }}</span>
                                        <span class="text-[10px] text-zinc-500 uppercase tracking-wider">Candidats</span>
                                    </div>

                                    <div class="flex items-center gap-2 md:ml-4">
                                        <button onclick="Livewire.dispatch('openEditModal', { id: {{ $vacancy->id }} })"
                                            class="p-2 text-zinc-400 hover:text-white hover:bg-zinc-800 rounded-lg transition-all border border-transparent hover:border-zinc-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </button>

                                        <form action="{{ route('vacancies.destroy', $vacancy->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-zinc-400 hover:text-red-500 hover:bg-red-500/10 rounded-lg transition-all border border-transparent hover:border-red-500/20">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>

                                        </form>
                                    </div>
                                </div>

                            </div>

                        @endforeach
                    </div>
                </main>

                <aside class="lg:col-span-3 space-y-6">
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
                                                {{ $invitation->sender->first_name }} {{ $invitation->sender->last_name }}
                                            </h4>
                                            <p class="text-xs text-zinc-500 mt-0.5">
                                                {{ $invitation->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">

                                        <form action="{{ route('connection.accepte', $invitation->id) }}" method="POST"
                                            class="flex-1">
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
                </aside>

            </div>
        </div>

        {{--MODAL / POPUP SECTION--}}

        <div x-show="showOfferModal" style="display: none;" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-[999] overflow-y-auto"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div x-show="showOfferModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/90 backdrop-blur-sm transition-opacity z-40"
                @click="showOfferModal = false" aria-hidden="true">
            </div>

            <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0 z-50 pointer-events-none">

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="showOfferModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="pointer-events-auto relative inline-block align-bottom bg-zinc-900 rounded-2xl text-left overflow-hidden shadow-2xl shadow-red-900/50 transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl w-full border border-red-900/40 z-50">
                    <div class="bg-zinc-950 px-6 py-4 border-b border-red-900/20 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-red-600/10 flex items-center justify-center border border-red-600/20">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg leading-6 font-bold text-white" id="modal-title">Create New Vacancy
                                </h3>
                                <p class="text-xs text-gray-500">Fill in the details to post a new job offer.</p>
                            </div>
                        </div>
                        <button @click="showOfferModal = false"
                            class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form action="{{ route('vacancies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="px-6 py-6 space-y-6">

                            <div class="space-y-2">
                                <label for="title"
                                    class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Job
                                    Title</label>
                                <input type="text" name="title" id="title" required
                                    class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all placeholder-gray-600"
                                    placeholder="e.g. Senior Laravel Developer">
                            </div>

                            <div class="space-y-2">
                                <label for="description"
                                    class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Description</label>
                                <textarea name="description" id="description" rows="4" required
                                    class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all placeholder-gray-600"
                                    placeholder="Describe the role..."></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="contract_type"
                                        class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Contract
                                        Type</label>
                                    <select name="contract_type" id="contract_type"
                                        class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all">
                                        <option value="CDI">CDI</option>
                                        <option value="CDD">CDD</option>
                                        <option value="Anapec">Anapec</option>
                                        <option value="Freelance">Freelance</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label for="location"
                                        class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Location</label>
                                    <input type="text" name="location" id="location" required
                                        class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all placeholder-gray-600"
                                        placeholder="e.g. Remote, Casablanca">
                                </div>

                                <div class="space-y-2 col-span-1 col-span-3">
                                    <label for="finish_at"
                                        class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Deadline</label>
                                    <input type="date" name="finish_at" id="finish_at" required
                                        class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all [color-scheme:dark]">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Cover
                                    Image</label>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-zinc-800 border-dashed rounded-xl hover:border-red-600/50 transition-colors bg-black">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-500" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4h-12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-400 justify-center">
                                            <label for="image"
                                                class="relative cursor-pointer rounded-md font-medium text-red-500 hover:text-red-400 focus-within:outline-none">
                                                <span>Upload a file</span>
                                                <input id="image" name="image" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-zinc-950 px-6 py-4 border-t border-red-900/20 flex justify-end gap-3 rounded-b-2xl">
                            <button type="button" @click="showOfferModal = false"
                                class="px-5 py-2.5 rounded-xl border border-zinc-700 text-gray-300 hover:bg-zinc-800 hover:text-white transition-all text-sm font-semibold">Cancel</button>
                            <button type="submit"
                                class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-red-600 to-red-800 hover:from-red-500 hover:to-red-700 text-white shadow-lg shadow-red-900/30 transition-all text-sm font-semibold">Publish
                                Vacancy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <livewire:show-modal-vacancies />

</x-app-layout>