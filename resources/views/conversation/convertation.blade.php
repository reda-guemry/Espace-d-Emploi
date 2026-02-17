<x-app-layout>
    <div class="h-screen bg-black text-white overflow-hidden flex flex-col">
        
        <div class="max-w-7xl mx-auto w-full h-full px-4 py-4">
            
            <div class="grid grid-cols-12 gap-6 h-full">

                <aside class="col-span-4 lg:col-span-3 h-full flex flex-col min-h-0">
                    <div class="h-[90%] bg-black rounded-3xl border border-red-900/30 flex flex-col overflow-hidden shadow-lg shadow-red-900/10">
                        <div class="p-5 border-b border-red-900/30 shrink-0">
                            <h2 class="text-xl font-extrabold text-white tracking-tight">Messages</h2>
                        </div>

                        <div class="flex-1 max overflow-y-auto p-3 space-y-1 custom-scrollbar">
                            @forelse($friends as $friend)
                                @php $isActive = isset($activeFriend) && $activeFriend->id === $friend->id; @endphp
                                <a href="{{ route('conversation', $friend->id) }}" 
                                   class="flex items-center gap-3 p-3 rounded-2xl transition-all duration-200 {{ $isActive ? 'bg-red-900/20 border border-red-600/30' : 'hover:bg-zinc-900 border border-transparent' }}">
                                    <img src="{{ asset('storage/profiles/' . $friend->profile_photo) }}" class="w-10 h-10 rounded-2xl object-cover border-2 {{ $isActive ? 'border-red-600' : 'border-zinc-800' }} shrink-0">
                                    <div class="min-w-0 flex-1">
                                        <p class="font-bold {{ $isActive ? 'text-white' : 'text-zinc-300' }} truncate text-sm capitalize">{{ $friend->first_name }} {{ $friend->last_name }}</p>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-10 text-zinc-500 text-xs">No friends found.</div>
                            @endforelse
                        </div>
                    </div>
                </aside>

                <main class="col-span-8 lg:col-span-9 h-full flex flex-col min-h-0">
                    <div class="flex flex-col h-[90%] bg-black rounded-3xl border border-red-900/30 overflow-hidden relative shadow-xl shadow-red-900/5">

                        @if(isset($activeFriend))
                            
                            <div class="px-6 py-4 border-b border-red-900/30 bg-zinc-900/50 backdrop-blur-md z-10 shrink-0 flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/profiles/' . $activeFriend->profile_photo) }}" class="w-10 h-10 rounded-2xl object-cover border border-zinc-700">
                                    <div>
                                        <p class="font-black text-white text-lg leading-none mb-1 capitalize">{{ $activeFriend->first_name }} {{ $activeFriend->last_name }}</p>
                                        <p class="text-xs font-bold text-zinc-400 uppercase tracking-wider flex items-center gap-1">
                                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Active Now
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div id="messages-container" class="flex-1 overflow-y-auto  min-h-0 p-6 bg-zinc-950 custom-scrollbar scroll-smooth">
                                <div class="flex flex-col gap-4">
                                    @forelse($messages as $message)
                                        @php 
                                            $isMe = $message->sender_id === Auth::id(); 
                                            $fileUrl = asset('storage/attachments/' . $message->attachment);
                                        @endphp
                                        
                                        <div class="flex w-full {{ $isMe ? 'justify-end' : 'justify-start' }}">
                                            <div class="flex max-w-[80%] {{ $isMe ? 'flex-row-reverse' : 'flex-row' }} items-end gap-2">
                                                <img src="{{ asset('storage/profiles/' . ($isMe ? Auth::user()->profile_photo : $activeFriend->profile_photo)) }}" 
                                                     class="w-6 h-6 rounded-full object-cover border border-zinc-700 mb-1 hidden sm:block shrink-0">
                                                
                                                <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }}">
                                                    <div class="px-4 py-2 rounded-2xl text-sm leading-relaxed overflow-hidden shadow-sm
                                                        {{ $isMe ? 'bg-red-600 text-white rounded-br-none' : 'bg-zinc-800 text-zinc-200 rounded-bl-none' }}">
                                                        
                                                        @if($message->content)
                                                            <p>{{ $message->content }}</p>
                                                        @endif

                                                        @if($message->attachment)
                                                            <div class="mt-2">
                                                                @if($message->type === 'image')
                                                                    <a href="{{ $fileUrl }}" target="_blank"><img src="{{ $fileUrl }}" class="rounded-lg max-h-48 w-auto object-cover border border-black/20"></a>
                                                                @elseif($message->type === 'video')
                                                                    <video controls class="rounded-lg max-h-48 w-full border border-black/20 bg-black"><source src="{{ $fileUrl }}"></video>
                                                                @else
                                                                    <a href="{{ $fileUrl }}" download class="flex items-center gap-2 p-2 rounded bg-black/20 hover:bg-black/30 transition">
                                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                                        <span class="text-xs underline">Download File</span>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <span class="text-[10px] text-zinc-600 mt-1 px-1">{{ $message->created_at->format('h:i A') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="flex h-full flex-col items-center justify-center space-y-2 opacity-50 py-10">
                                            <p>No messages yet.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <div class="p-4 bg-black border-t border-red-900/30 shrink-0 z-20">
                                <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $activeFriend->id }}">
                                    
                                    <div id="file-preview" class="hidden items-center gap-2 p-2 bg-zinc-900 rounded-lg border border-red-900/30 mb-1">
                                        <span class="text-xs font-bold text-zinc-300 px-2 truncate max-w-xs" id="file-name"></span>
                                        <button type="button" onclick="clearFile()" class="ml-auto text-red-500 hover:text-white"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg></button>
                                    </div>

                                    <div class="flex items-center gap-2 bg-zinc-900 p-1.5 rounded-3xl border border-zinc-800 focus-within:border-red-600 transition-colors">
                                        <button type="button" onclick="document.getElementById('file-input').click()" class="p-2 text-zinc-400 hover:text-white transition-colors rounded-full hover:bg-zinc-800">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                        </button>
                                        <input type="file" name="attachment" id="file-input" class="hidden" onchange="handleFileSelect(this)">
                                        
                                        <input type="text" name="content" placeholder="Type a message..." class="flex-1 bg-transparent border-none focus:ring-0 text-sm text-white placeholder-zinc-500" autocomplete="off">
                                        
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-2xl font-bold text-sm transition-all shadow-lg hover:shadow-red-600/20">Send</button>
                                    </div>
                                </form>
                            </div>

                        @else
                            <div class="flex flex-col items-center justify-center h-full text-zinc-500">
                                <div class="w-20 h-20 bg-zinc-900 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                                </div>
                                <p class="text-lg font-medium">Select a friend to start chatting</p>
                            </div>
                        @endif
                    </div>
                </main>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #3f3f46; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #52525b; }
    </style>

    <script>
        function scrollToBottom() {
            const container = document.getElementById('messages-container');
            if (container) container.scrollTop = container.scrollHeight;
        }

        // Scroll immediately and after images load
        document.addEventListener("DOMContentLoaded", scrollToBottom);
        window.onload = scrollToBottom;

        function handleFileSelect(input) {
            if (input.files && input.files[0]) {
                document.getElementById('file-name').innerText = input.files[0].name;
                document.getElementById('file-preview').classList.replace('hidden', 'flex');
            }
        }
        function clearFile() {
            document.getElementById('file-input').value = '';
            document.getElementById('file-preview').classList.replace('flex', 'hidden');
        }
    </script>
</x-app-layout>