<?php

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

new class extends Component {
    public $skills = [];
    public $newSkill = '';



    public function mount()
    {
        $this->skills = Auth::user()->skills ?? [];
        
    }

    public function addSkill()
    {

        if ($this->newSkill === '') {
            return;
        }

        if (in_array($this->newSkill, $this->skills)) {
            return;
        }

        $this->skills[] = $this->newSkill;

        Auth::user()->update(['skills' => $this->skills]);

        $this->newSkill = '';

    }

    public function removeSkill($index)
    {
        unset($this->skills[$index]);

        $this->skills = array_values($this->skills);

        Auth::user()->update(['skills' => $this->skills]);

    }


};
?>

<div class="space-y-4">
    <div class="flex justify-between items-end mb-2">
        <label class="text-xs uppercase tracking-wider text-zinc-500 font-bold ml-1">
            Professional Skills
        </label>

        <span wire:loading class="text-xs text-red-500 font-medium animate-pulse">
            Saving changes...
        </span>
    </div>

    {{-- Input Area --}}
    <form wire:submit.prevent="addSkill" class="relative group ">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-zinc-500 group-focus-within:text-red-500 transition-colors duration-300"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                </path>
            </svg>
        </div>

        <div class="relative">
            <input type="text" wire:model="newSkill" placeholder="Type a skill and press Enter (e.g. Laravel)"
                class="pl-12 pr-12 block w-full bg-zinc-950 border-zinc-800 text-gray-100 rounded-xl focus:border-red-500 focus:ring-red-500/20 py-3.5 transition-all shadow-inner placeholder-zinc-700">
    
            {{-- Add Button (Inside Input) --}}
            <button type="submit"
                class="absolute right-2 top-6  transform -translate-y-1/2 bg-zinc-800 hover:bg-red-600 text-zinc-400 hover:text-white p-2 rounded-lg transition-all duration-300 shadow-lg hover:shadow-red-500/20 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </button>

        </div>
    </form>

    {{-- Error Message --}}
    @error('newSkill') <span class="text-red-400 text-sm ml-1">{{ $message }}</span> @enderror

    {{-- Skills List Display --}}
    @if(count($skills) > 0)
        <div class="flex flex-wrap gap-2 pt-2">
            @foreach($skills as $index => $skill)
                <div wire:key="skill-{{ $index }}"
                    class="group flex items-center gap-2 pl-3 pr-2 py-1.5 rounded-lg bg-zinc-900 border border-zinc-800 text-sm font-medium text-zinc-300 hover:border-red-500/30 transition-all duration-300 select-none">
                    <span>{{ $skill }}</span>

                    {{-- Delete Button --}}
                    <button wire:click="removeSkill({{ $index }})" type="button"
                        class="p-0.5 rounded-md text-zinc-500 hover:bg-red-500/20 hover:text-red-500 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-zinc-600 text-sm italic ml-1">No skills added yet. Start typing above...</p>
    @endif
</div>