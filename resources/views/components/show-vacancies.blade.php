<?php


use Livewire\Component;
use Livewire\Attributes\Lazy;
use App\Models\Vacancie ; 
use App\Services\VacancieService ; 


new class extends Component {

    public $limit = 10 ; 
    public $totalVacancie ;
    public $vacancies ;  
    
    public function mount() {
        $this -> totalVacancie = Vacancie::count() ;        
    }

    public function loadMore () { 
        $this -> limit += 10 ; 
    }

    public function with(VacancieService $service) {
        $vacancies = $service -> getVacanciesByLimit($this -> limit) ; 

        return [ 
            'vacancies' => $vacancies
        ];
    }

};
?>

<div class="">
    
    <div class="grid gap-4">
        

        @foreach($vacancies as $vacancy)
            

            <div wire:key="{{ $vacancy->id }}" class="group relative bg-zinc-900 border border-zinc-800 hover:border-red-500/50 rounded-2xl p-5 transition-all duration-300 hover:shadow-xl hover:shadow-red-500/10 flex flex-col h-full">
                
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 rounded-xl bg-zinc-800 flex items-center justify-center overflow-hidden border border-zinc-700 shadow-sm">
                        @if($vacancy->image)
                            <img src="{{ asset('storage/vacancy/' . $vacancy ->image) }}" alt="{{ $vacancy->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        @else
                            <span class="text-lg font-bold text-zinc-500">{{ substr($vacancy->title, 0, 1) }}</span>
                        @endif
                    </div>

                    <span class="{{ $vacancy->status === 'open' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-red-500/10 text-red-400 border-red-500/20' }} text-xs font-medium px-2.5 py-1 rounded-full border flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full {{ $vacancy->status === 'open' ? 'bg-emerald-400 animate-pulse' : 'bg-red-400' }}"></span>
                        {{ ucfirst($vacancy->status) }}
                    </span>
                </div>

                <div class="flex-1">
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-red-500 transition-colors line-clamp-1">
                        {{ $vacancy->title }}
                    </h3>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2.5 py-1 bg-zinc-800 text-zinc-300 text-xs font-medium rounded-lg border border-zinc-700 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            {{ $vacancy->contract_type }}
                        </span>
                        
                        <span class="px-2.5 py-1 bg-zinc-800 text-zinc-300 text-xs font-medium rounded-lg border border-zinc-700 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
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
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ \Carbon\Carbon::parse($vacancy->finish_at)->format('d M, Y') }}
                        </span>
                    </div>

                    <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-black text-xs font-bold rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300">
                        Apply Now
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        
        @endforeach
    </div>

    
    @if($vacancies->count() < $totalVacancie)
        <div 
            x-intersect="$wire.loadMore()" 
            class="p-8 flex justify-center items-center"
        >
            <div wire:loading wire:target="loadMore" class="text-red-500">
                <svg class="animate-spin h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
    @endif

</div>