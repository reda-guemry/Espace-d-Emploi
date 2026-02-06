<div x-show="activeModal === 'experience'" 
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    style="display: none;">

    <div @click.away="activeModal = null"
        class="bg-zinc-900 border border-zinc-800 w-full max-w-lg rounded-2xl shadow-2xl relative overflow-hidden"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100">

        <div class="px-6 py-4 border-b border-zinc-800 flex justify-between items-center bg-zinc-950/50">
            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                <span class="w-2 h-2 bg-red-600 rounded-full"></span>
                Add Experience
            </h3>
            <button @click="activeModal = null" class="text-zinc-500 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('candidate.dashboard') }}" method="POST" class="p-6 space-y-4">
            @csrf
            
            <div class="space-y-1">
                <label class="text-xs font-bold text-zinc-500 uppercase">Job Title</label>
                <input type="text" name="title" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white focus:ring-1 focus:ring-red-600 focus:border-red-600 outline-none transition-all placeholder-zinc-700" placeholder="e.g. Senior Laravel Developer" required>
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-zinc-500 uppercase">Company</label>
                <input type="text" name="company" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white focus:ring-1 focus:ring-red-600 focus:border-red-600 outline-none transition-all placeholder-zinc-700" placeholder="e.g. Google Inc." required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-zinc-500 uppercase">Start Date</label>
                    <input type="date" name="start_date" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white focus:ring-1 focus:ring-red-600 outline-none scheme-dark" required>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-zinc-500 uppercase">End Date</label>
                    <input type="date" name="end_date" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white focus:ring-1 focus:ring-red-600 outline-none scheme-dark">
                </div>
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-zinc-500 uppercase">Description</label>
                <textarea name="description" rows="3" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white focus:ring-1 focus:ring-red-600 outline-none transition-all placeholder-zinc-700 resize-none" placeholder="Briefly describe your responsibilities..."></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-zinc-800">
                <button type="button" @click="activeModal = null" class="px-4 py-2 text-sm font-medium text-zinc-400 hover:text-white transition-colors">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-lg transition-all shadow-lg shadow-red-900/20">Save Experience</button>
            </div>
        </form>
    </div>
</div>