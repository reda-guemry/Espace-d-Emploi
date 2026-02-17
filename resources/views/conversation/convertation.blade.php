<x-app-layout>
    <div class="h-screen bg-black text-white">
        <div class="max-w-7xl mx-auto h-full px-4 py-6">
            <div class="grid grid-cols-12 gap-6 h-[calc(100vh-100px)]">

                <aside class="col-span-4 lg:col-span-3 h-full">
                    <div class="h-full bg-black rounded-3xl border border-red-900/30 overflow-hidden flex flex-col shadow-lg shadow-red-900/10">
                        <div class="p-5 border-b border-red-900/30">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-xl font-extrabold text-white tracking-tight">Messages</h2>
                            </div>
                        </div>

                        <div class="flex-1 overflow-y-auto p-3 space-y-1 custom-scrollbar">
                            @forelse($friends as $friend)
                                @php
                                    $isActive = isset($activeFriende) && $activeFriende->id === $friend->id;
                                @endphp

                                <a href="{{ route('conversation', $friend->id) }}"
                                    class="flex items-center gap-3 p-3 rounded-2xl transition-all duration-200 
                                    {{ $isActive 
                                        ? 'bg-red-900/20 border border-red-600/30' 
                                        : 'hover:bg-zinc-900 border border-transparent' 
                                    }}">
                                    
                                    <div class="relative">
                                        <img src="{{ asset('storage/profiles/' . $friend->profile_photo) }}" 
                                             alt="{{ $friend->first_name }}"
                                             class="w-12 h-12 rounded-2xl object-cover border-2 {{ $isActive ? 'border-red-600' : 'border-zinc-800' }}">
                                        
                                        <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 border-2 border-black rounded-full"></div>
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <p class="font-bold {{ $isActive ? 'text-white' : 'text-zinc-300' }} truncate capitalize">
                                            {{ $friend->first_name }} {{ $friend->last_name }}
                                        </p>
                                        <p class="text-xs {{ $isActive ? 'text-red-400' : 'text-zinc-500' }} truncate">
                                            Click to chat
                                        </p>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-10 text-zinc-500 text-sm">
                                    No friends found.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </aside>

                <main class="col-span-8 lg:col-span-9 h-full">
                    <div class="h-full bg-black rounded-3xl border border-red-900/30 overflow-hidden flex flex-col relative shadow-xl shadow-red-900/5">

                        @if(isset($activeFriende))
                            <div class="px-6 py-4 border-b border-red-900/30 bg-zinc-900/50 backdrop-blur-md sticky top-0 z-10">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/profiles/' . $activeFriende->profile_photo) }}" 
                                         class="w-12 h-12 rounded-2xl object-cover border border-zinc-700">
                                    
                                    <div class="flex-1">
                                        <p class="font-black text-white text-lg leading-none mb-1 capitalize">
                                            {{ $activeFriende->first_name }} {{ $activeFriende->last_name }}
                                        </p>
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                            <p class="text-xs font-bold text-zinc-400 uppercase tracking-wider">Active Now</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="messages-container" class="flex-1 overflow-y-auto px-6 py-8 bg-zinc-950 scroll-smooth custom-scrollbar">
                                <div class="space-y-6">
                                    
                                    @forelse($messages as $message)
                                        @php
                                            $isMe = $message->sender_id === Auth::id();
                                        @endphp

                                        <div class="flex w-full {{ $isMe ? 'justify-end' : 'justify-start' }}">
                                            <div class="flex max-w-[75%] {{ $isMe ? 'flex-row-reverse' : 'flex-row' }} items-end gap-3">
                                                
                                                <img src="{{ asset('storage/profiles/' . ($isMe ? Auth::user()->profile_photo : $activeFriende->profile_photo)) }}" 
                                                     class="w-8 h-8 rounded-full object-cover border border-zinc-700 mb-1 hidden sm:block">

                                                <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }}">
                                                    <div class="px-5 py-3 rounded-2xl shadow-md text-sm leading-relaxed
                                                        {{ $isMe 
                                                            ? 'bg-red-600 text-white rounded-br-none border border-red-500' 
                                                            : 'bg-zinc-800 text-zinc-200 border border-zinc-700 rounded-bl-none' 
                                                        }}">
                                                        
                                                        @if($message->content)
                                                            <p>{{ $message->content }}</p>
                                                        @endif

                                                        @if($message->attachment)
                                                            <div class="mt-2">
                                                                <img src="{{ asset('storage/attachments/' . $message->attachment) }}" class="rounded-lg max-h-40 object-cover border border-black/20">
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <span class="text-[10px] font-medium text-zinc-600 mt-1 px-1">
                                                        {{ $message->created_at->format('h:i A') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="flex flex-col items-center justify-center h-full py-10">
                                            <div class="w-16 h-16 bg-zinc-900 rounded-full flex items-center justify-center mb-3">
                                                <svg class="w-8 h-8 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                                </svg>
                                            </div>
                                            <p class="text-zinc-500 font-medium">No messages yet. Say hello!</p>
                                        </div>
                                    @endforelse

                                </div>
                            </div>

                            <div class="p-4 bg-black border-t border-red-900/30">
                                <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $activeFriende->id }}">

                                    <div id="file-preview" class="hidden items-center gap-2 p-3 bg-zinc-900 rounded-2xl border border-red-900/30 mx-1">
                                        <div class="w-8 h-8 rounded-full bg-zinc-800 flex items-center justify-center text-red-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs font-bold text-zinc-300 px-2 truncate max-w-xs" id="file-name"></span>
                                        <button type="button" onclick="clearFile()" class="ml-auto p-1 text-zinc-500 hover:text-red-500 transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                        </button>
                                    </div>

                                    <div class="flex items-center gap-3 bg-zinc-900 p-2 rounded-3xl border border-zinc-800 focus-within:border-red-600/50 transition-all focus-within:ring-1 focus-within:ring-red-900/50">
                                        <button type="button" onclick="document.getElementById('file-input').click()" class="p-3 text-zinc-400 hover:text-red-500 hover:bg-zinc-800 transition-all rounded-full">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                            </svg>
                                        </button>

                                        <input type="file" name="attachment" id="file-input" class="hidden" onchange="handleFileSelect(this)">

                                        <input type="text" name="content" placeholder="Type a message..." class="flex-1 bg-transparent border-none focus:ring-0 text-sm py-3 text-white placeholder-zinc-500" autocomplete="off">

                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-bold text-sm transition-all shadow-lg shadow-red-900/20 hover:shadow-red-600/40 active:scale-95">
                                            Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                        
                        @else
                            <div class="flex flex-col items-center justify-center h-full text-zinc-500">
                                <div class="w-24 h-24 bg-zinc-900 rounded-full border border-zinc-800 flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
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
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #18181b; 
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #3f3f46; 
            border-radius: 10px;
        }
    </style>

    <script>
        const container = document.getElementById('messages-container');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }

        function handleFileSelect(input) {
            const preview = document.getElementById('file-preview');
            const nameSpan = document.getElementById('file-name');
            if (input.files && input.files[0]) {
                nameSpan.innerText = input.files[0].name;
                preview.classList.remove('hidden');
                preview.classList.add('flex');
            }
        }

        function clearFile() {
            const input = document.getElementById('file-input');
            const preview = document.getElementById('file-preview');
            input.value = ''; 
            preview.classList.add('hidden');
            preview.classList.remove('flex');
        }
    </script>
</x-app-layout>