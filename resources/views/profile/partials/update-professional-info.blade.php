<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Professional Background') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Manage your professional history. You can remove outdated education or experience entries here.') }}
        </p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        {{-- COLUMN 1: EXPERIENCE --}}
        <div class="space-y-4">
            <h3 class="text-md font-bold text-red-500 uppercase tracking-wider text-xs border-b border-white/10 pb-2 mb-4">
                Experience History
            </h3>

            @if($user->experiences && $user->experiences->count() > 0)
                @foreach($user->experiences as $experience)
                    <div class="relative group bg-zinc-900 border border-zinc-800 hover:border-red-900/50 rounded-xl p-5 transition-all duration-300">
                        
                        {{-- Content --}}
                        <div class="pr-8">
                            <h4 class="text-white font-bold text-base">{{ $experience->position }}</h4>
                            <p class="text-zinc-400 text-sm mt-1">{{ $experience->company_name }}</p>
                            <div class="flex items-center gap-2 mt-3 text-xs text-zinc-500">
                                <span class="bg-zinc-950 px-2 py-1 rounded border border-zinc-800">
                                    {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} 
                                    - 
                                    {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                                </span>
                            </div>
                        </div>

                        {{-- Delete Button (Top Right) --}}
                        <form action="{{ route('experience.destroy', $experience->id) }}" method="POST" 
                              class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity"
                              onsubmit="return confirm('Are you sure you want to delete this experience?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-zinc-500 hover:text-red-500 hover:bg-red-500/10 rounded-lg transition-colors">
                                <span class="sr-only">Delete</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            @else
                <div class="p-6 border border-dashed border-zinc-800 rounded-xl text-center">
                    <p class="text-zinc-500 text-sm">No experience added yet.</p>
                </div>
            @endif
        </div>

        {{-- COLUMN 2: EDUCATION --}}
        <div class="space-y-4">
            <h3 class="text-md font-bold text-red-500 uppercase tracking-wider text-xs border-b border-white/10 pb-2 mb-4">
                Education History
            </h3>

            @if($user->educations && $user->educations->count() > 0)
                @foreach($user->educations as $education)
                    <div class="relative group bg-zinc-900 border border-zinc-800 hover:border-red-900/50 rounded-xl p-5 transition-all duration-300">
                        
                        {{-- Content --}}
                        <div class="pr-8">
                            <h4 class="text-white font-bold text-base">{{ $education->degree }}</h4>
                            <p class="text-zinc-400 text-sm mt-1">{{ $education->school }}</p>
                            <div class="flex items-center gap-2 mt-3 text-xs text-zinc-500">
                                <span class="bg-zinc-950 px-2 py-1 rounded border border-zinc-800">
                                    {{ \Carbon\Carbon::parse($education->start_date)->format('Y') }} 
                                    - 
                                    {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y') : 'Present' }}
                                </span>
                            </div>
                        </div>

                        {{-- Delete Button (Top Right) --}}
                        <form action="{{ route('education.destroy', $education->id) }}" method="POST" 
                              class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity"
                              onsubmit="return confirm('Are you sure you want to delete this education?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-zinc-500 hover:text-red-500 hover:bg-red-500/10 rounded-lg transition-colors">
                                <span class="sr-only">Delete</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            @else
                <div class="p-6 border border-dashed border-zinc-800 rounded-xl text-center">
                    <p class="text-zinc-500 text-sm">No education added yet.</p>
                </div>
            @endif
        </div>

    </div>
</section>