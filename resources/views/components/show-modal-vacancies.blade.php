<?php

use Livewire\Component;
use App\Services\VacancieService;
use Livewire\Attributes\On;
use App\DTOs\VacancieDTO;

new class extends Component {

    public $isEditModalOpen = false;
    public $editingId = null;

    // protected $listeners = [
    //     'openEditModal' => 'edit',
    // ];


    // proprieter data for view 

    public $title;
    public $location;
    public $description;
    public $contract_type;
    public $status;
    public $finish_at;


    #[On('openEditModal')]
    public function edit($id)
    {
        // var_dump($payload); 
        // exit ; 
        // dd('Livewire');

        $vacancieService = app(VacancieService::class);

        $vacancieModel = $vacancieService->findVacancie($id);

        $this->editingId = $vacancieModel->id;
        $this->title = $vacancieModel->title;
        $this->location = $vacancieModel->location;
        $this->description = $vacancieModel->description;
        $this->contract_type = $vacancieModel->contract_type;
        $this->status = $vacancieModel->status;
        $this->finish_at = $vacancieModel->finish_at ; 

        $this->isEditModalOpen = true;

    }

    public function cancelEdit()
    {
        $this->reset(['isEditModalOpen', 'editingId', 'title', 'location', 'description', 'status']);
    }

};
?>
<div>
    @if($isEditModalOpen)
        <div class="fixed inset-0 z-[999] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            
            <div class="fixed inset-0 bg-black/90 backdrop-blur-sm transition-opacity z-40"
                 wire:click="cancelEdit"
                 aria-hidden="true">
            </div>

            <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0 z-50 pointer-events-none">
                
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="pointer-events-auto relative inline-block align-bottom bg-zinc-900 rounded-2xl text-left overflow-hidden shadow-2xl shadow-red-900/50 transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl w-full border border-red-900/40 z-50">
                    
                    <div class="bg-zinc-950 px-6 py-4 border-b border-red-900/20 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-red-600/10 flex items-center justify-center border border-red-600/20">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg leading-6 font-bold text-white" id="modal-title">
                                    Edit Vacancy
                                </h3>
                                <p class="text-xs text-gray-500">Update the details of this job offer.</p>
                            </div>
                        </div>
                        <button wire:click="cancelEdit" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form action="{{ route('vacancies.update', $editingId) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <input type="hidden" name="id" value="{{ $editingId }}">

                        <div class="px-6 py-6 space-y-6">

                            <div class="space-y-2">
                                <label for="title" class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Job Title</label>
                                <input type="text" name="title" id="title" wire:model="title" required
                                    class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all placeholder-gray-600"
                                    placeholder="e.g. Senior Laravel Developer">
                            </div>

                            <div class="space-y-2">
                                <label for="description" class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Description</label>
                                <textarea name="description" id="description" rows="4" wire:model="description" required
                                    class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all placeholder-gray-600"
                                    placeholder="Describe the role..."></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                
                                <div class="space-y-2">
                                    <label for="contract_type" class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Contract Type</label>
                                    <select name="contract_type" id="contract_type" wire:model="contract_type"
                                        class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all">
                                        <option value="CDI">CDI</option>
                                        <option value="CDD">CDD</option>
                                        <option value="Anapec">Anapec</option>
                                        <option value="Freelance">Freelance</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label for="location" class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Location</label>
                                    <input type="text" name="location" id="location" wire:model="location" required
                                        class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all placeholder-gray-600"
                                        placeholder="e.g. Remote, Casablanca">
                                </div>

                                <div class="col-span-1 md:col-span-2 space-y-2">
                                    <label for="finish_at" class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Deadline</label>
                                    <input type="date" name="finish_at" id="finish_at" wire:model="finish_at" required
                                        class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all [color-scheme:dark]">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs font-bold text-gray-300 uppercase tracking-wider">Cover Image</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-zinc-800 border-dashed rounded-xl hover:border-red-600/50 transition-colors bg-black">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-500" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4h-12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-400 justify-center">
                                            <label for="image" class="relative cursor-pointer rounded-md font-medium text-red-500 hover:text-red-400 focus-within:outline-none">
                                                <span>Upload a file</span>
                                                <input id="image" name="image" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-zinc-950 px-6 py-4 border-t border-red-900/20 flex justify-end gap-3 rounded-b-2xl">
                            <button type="button" wire:click="cancelEdit"
                                class="px-5 py-2.5 rounded-xl border border-zinc-700 text-gray-300 hover:bg-zinc-800 hover:text-white transition-all text-sm font-semibold">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-red-600 to-red-800 hover:from-red-500 hover:to-red-700 text-white shadow-lg shadow-red-900/30 transition-all text-sm font-semibold">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>