<div x-show="activeModal === 'education'" 
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 backdrop-blur-sm p-4"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    style="display: none;">

    <div @click.away="activeModal = null"
        class="bg-zinc-900 border border-red-900/30 w-full max-w-lg rounded-2xl shadow-2xl shadow-red-900/20 relative overflow-hidden"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100">

        <div class="px-6 py-4 border-b border-red-900/20 flex justify-between items-center bg-zinc-950">
            <h3 class="text-lg font-bold text-white flex items-center gap-3">
                <span class="w-2.5 h-2.5 bg-red-600 rounded-full shadow-[0_0_10px_rgba(220,38,38,0.5)]"></span>
                Add Education
            </h3>
            <button @click="activeModal = null" class="text-zinc-500 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('education.store') }}" method="POST" class="p-6 space-y-5">
            @csrf
            
            <div class="space-y-2">
                <label class="text-xs font-bold text-zinc-400 uppercase tracking-wider">Degree</label>
                <input type="text" name="degree" 
                    class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all placeholder-zinc-700" 
                    placeholder="e.g. Bachelor in Computer Science" required>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-zinc-400 uppercase tracking-wider">School / University</label>
                <input type="text" name="school" 
                    class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all placeholder-zinc-700" 
                    placeholder="e.g. MIT" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-zinc-400 uppercase tracking-wider">Start Date</label>
                    <input type="date" name="start_date" 
                        class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all [color-scheme:dark]" required>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-zinc-400 uppercase tracking-wider">End Date <span class="text-zinc-600 normal-case">(Optional)</span></label>
                    <input type="date" name="end_date" 
                        class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all [color-scheme:dark]">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-zinc-400 uppercase tracking-wider">Description <span class="text-zinc-600 normal-case">(Optional)</span></label>
                <textarea name="description" rows="3" 
                    class="w-full bg-black border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all placeholder-zinc-700 resize-none" 
                    placeholder="Activities, societies, and honors..."></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-red-900/20">
                <button type="button" @click="activeModal = null" class="px-5 py-2.5 rounded-xl border border-zinc-700 text-zinc-400 hover:bg-zinc-800 hover:text-white transition-all text-sm font-semibold">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-800 hover:from-red-500 hover:to-red-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-red-900/30">Save Education</button>
            </div>
        </form>
    </div>
</div>