<?php


use Livewire\Component;
use Livewire\Attributes\Lazy;
use App\Models\Vacancie;
use App\Services\VacancieService;


new class extends Component {

    public $limit = 10;
    public $totalVacancie;
    public $vacancies;

    public function mount()
    {
        $this->totalVacancie = Vacancie::count();
    }

    public function loadMore()
    {
        $this->limit += 10;
    }

    public function with(VacancieService $service)
    {
        $vacancies = $service->getVacanciesByLimit($this->limit);

        return [
            'vacancies' => $vacancies
        ];
    }

};

?>


<div class="" x-data="{openModal: false, jobId: null, jobTitle: ''}">

    <div class="grid gap-4">


        @foreach($vacancies as $vacancy)


            <div wire:key="{{ $vacancy->id }}"
                class="group relative bg-zinc-900 border border-zinc-800 hover:border-red-500/50 rounded-2xl p-5 transition-all duration-300 hover:shadow-xl hover:shadow-red-500/10 flex flex-col h-full">

                <div class="flex justify-between items-start mb-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-zinc-800 flex items-center justify-center overflow-hidden border border-zinc-700 shadow-sm">
                        @if($vacancy->image)
                            <img src="{{ asset('storage/vacancy/' . $vacancy->image) }}" alt="{{ $vacancy->title }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        @else
                            <span class="text-lg font-bold text-zinc-500">{{ substr($vacancy->title, 0, 1) }}</span>
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
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-red-500 transition-colors line-clamp-1">
                        {{ $vacancy->title }}
                    </h3>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span
                            class="px-2.5 py-1 bg-zinc-800 text-zinc-300 text-xs font-medium rounded-lg border border-zinc-700 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $vacancy->contract_type }}
                        </span>

                        <span
                            class="px-2.5 py-1 bg-zinc-800 text-zinc-300 text-xs font-medium rounded-lg border border-zinc-700 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                    <button @click="openModal = true; jobId = {{ $vacancy->id }}; jobTitle = '{{ $vacancy->title }}'"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-white text-black text-xs font-bold rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300">
                        Apply Now
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
            </div>

        @endforeach
    </div>


    @if($vacancies->count() < $totalVacancie)
        <div x-intersect="$wire.loadMore()" class="p-8 flex justify-center items-center">
            <div wire:loading wire:target="loadMore" class="text-red-500">
                <svg class="animate-spin h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>
        </div>
    @endif


    <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        <div @click="openModal = false" class="fixed inset-0 bg-black/80 backdrop-blur-md transition-opacity"></div>

        <div
            class="relative w-full max-w-lg transform rounded-2xl bg-zinc-900 transition-all shadow-2xl shadow-red-900/20 group">

            <div
                class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-red-900 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-1000">
            </div>

            <div class="relative bg-zinc-950/90 backdrop-blur-xl rounded-2xl border border-white/5 overflow-hidden">

                <div class="relative px-6 py-6 border-b border-white/5 bg-gradient-to-b from-white/5 to-transparent">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-red-500 mb-1 flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>
                                New Application
                            </p>
                            <h3 class="text-2xl font-bold text-white tracking-tight">
                                <span x-text="jobTitle"></span>
                            </h3>
                        </div>
                        <button @click="openModal = false"
                            class="text-zinc-500 hover:text-white transition-colors p-1 hover:bg-white/5 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <form action="{{ route('vacancie.apply') }}" method="POST" enctype="multipart/form-data"
                    class="p-6 space-y-6">
                    @csrf
                    <input type="hidden" name="vacancy_id" :value="jobId">

                    <div class="space-y-2" x-data="{ fileName: '' }">
                        <label class="text-sm font-medium text-zinc-300">Resume / CV <span
                                class="text-red-500">*</span></label>
                        <div class="relative group cursor-pointer">
                            <input type="file" name="cv" required accept=".pdf,.doc,.docx"
                                @change="fileName = $event.target.files[0].name"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                            <div
                                class="border-2 border-dashed border-zinc-700 group-hover:border-red-500/50 bg-zinc-900/50 rounded-xl p-6 flex flex-col items-center justify-center transition-all duration-300 group-hover:bg-zinc-900">
                                <div
                                    class="w-10 h-10 rounded-full bg-zinc-800 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform shadow-inner">
                                    <svg class="w-5 h-5 text-zinc-400 group-hover:text-red-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>
                                <p class="text-sm text-zinc-400 text-center">
                                    <span x-show="!fileName">
                                        <span class="font-semibold text-white">Click to upload</span> or drag and
                                        drop<br>
                                        <span class="text-xs text-zinc-500">PDF, DOC, DOCX (Max 10MB)</span>
                                    </span>
                                    <span x-show="fileName" x-text="fileName"
                                        class="text-white font-medium break-all"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Cover Letter <span
                                class="text-zinc-500 text-xs">(Optional)</span></label>
                        <div class="relative">
                            <textarea name="message" rows="4"
                                class="w-full bg-zinc-900/50 border border-zinc-700 rounded-xl px-4 py-3 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none resize-none placeholder-zinc-600 transition-all"
                                placeholder="Tell us why you are the perfect fit for this role..."></textarea>
                        </div>
                    </div>

                    <div class="pt-2 flex items-center justify-end gap-3">
                        <button type="button" @click="openModal = false"
                            class="px-4 py-2.5 text-sm font-medium text-zinc-400 hover:text-white transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="group relative px-6 py-2.5 bg-red-600 hover:bg-red-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-red-900/20 overflow-hidden transition-all hover:scale-105 active:scale-95">
                            <div
                                class="absolute inset-0 bg-white/20 group-hover:translate-x-full transition-transform duration-500 -skew-x-12 -translate-x-full">
                            </div>
                            Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>