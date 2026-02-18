<x-app-layout>
    <div class="h-screen bg-black text-white overflow-hidden flex flex-col">

        <div class="max-w-7xl mx-auto w-full h-full px-4 py-4">

            <div class="grid grid-cols-12 gap-6 h-full">

                <aside class="col-span-4 lg:col-span-3 h-full flex flex-col min-h-0">
                    <div
                        class="h-[90%] bg-black rounded-3xl border border-red-900/30 flex flex-col overflow-hidden shadow-lg shadow-red-900/10">
                        <div class="p-5 border-b border-red-900/30 shrink-0">
                            <h2 class="text-xl font-extrabold text-white tracking-tight">Messages</h2>
                        </div>

                        <div class="flex-1 max overflow-y-auto p-3 space-y-1 custom-scrollbar">
                            @forelse($friends as $friend)
                                @php $isActive = isset($activeFriend) && $activeFriend->id === $friend->id; @endphp
                                <a href="{{ route('conversation', $friend->id) }}"
                                    class="flex items-center gap-3 p-3 rounded-2xl transition-all duration-200 {{ $isActive ? 'bg-red-900/20 border border-red-600/30' : 'hover:bg-zinc-900 border border-transparent' }}">
                                    <img src="{{ asset('storage/profiles/' . $friend->profile_photo) }}"
                                        class="w-10 h-10 rounded-2xl object-cover border-2 {{ $isActive ? 'border-red-600' : 'border-zinc-800' }} shrink-0">
                                    <div class="min-w-0 flex-1">
                                        <p
                                            class="font-bold {{ $isActive ? 'text-white' : 'text-zinc-300' }} truncate text-sm capitalize">
                                            {{ $friend->first_name }} {{ $friend->last_name }}</p>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-10 text-zinc-500 text-xs">No friends found.</div>
                            @endforelse
                        </div>
                    </div>
                </aside>

                <main class="col-span-8 lg:col-span-9 h-full flex flex-col min-h-0">
                    <div
                        class="flex flex-col h-[90%] bg-black rounded-3xl border border-red-900/30 overflow-hidden relative shadow-xl shadow-red-900/5">

                        @if(isset($activeFriend))

                            <div
                                class="px-6 py-4 border-b border-red-900/30 bg-zinc-900/50 backdrop-blur-md z-10 shrink-0 flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/profiles/' . $activeFriend->profile_photo) }}"
                                        class="w-10 h-10 rounded-2xl object-cover border border-zinc-700">
                                    <div>
                                        <p class="font-black text-white text-lg leading-none mb-1 capitalize">
                                            {{ $activeFriend->first_name }} {{ $activeFriend->last_name }}</p>
                                        <p
                                            class="text-xs font-bold text-zinc-400 uppercase tracking-wider flex items-center gap-1">
                                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Active Now
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div id="messages-container"
                                class="flex-1 overflow-y-auto  min-h-0 p-6 bg-zinc-950 custom-scrollbar scroll-smooth">
                                <div class="flex flex-col gap-4">
                                    @forelse($messages as $message)
                                                    @php
                                                        $isMe = $message->sender_id === Auth::id();
                                                        $fileUrl = asset('storage/attachments/' . $message->attachment);
                                                    @endphp

                                                    <div class="flex w-full {{ $isMe ? 'justify-end' : 'justify-start' }}">
                                                        <div
                                                            class="flex max-w-[75%] {{ $isMe ? 'flex-row-reverse' : 'flex-row' }} items-end gap-3">

                                                            <img src="{{ asset('storage/profiles/' . ($isMe ? Auth::user()->profile_photo : $activeFriend->profile_photo)) }}"
                                                                class="w-8 h-8 rounded-full object-cover border border-zinc-700 mb-1 hidden sm:block shrink-0">

                                                            <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }}">
                                                                <div
                                                                    class="px-4 py-3 rounded-2xl shadow-md text-sm leading-relaxed overflow-hidden
                                        {{ $isMe ? 'bg-red-600 text-white rounded-br-none border border-red-500' : 'bg-zinc-800 text-zinc-200 border border-zinc-700 rounded-bl-none' }}">

                                                                    @if($message->content)
                                                                        <p class="{{ $message->attachment ? 'mb-2' : '' }}">
                                                                            {{ $message->content }}</p>
                                                                    @endif

                                                                    @if($message->attachment)
                                                                        @if($message->type === 'image')
                                                                            <a href="{{ $fileUrl }}" target="_blank">
                                                                                <img src="{{ $fileUrl }}"
                                                                                    class="rounded-lg max-h-60 w-auto object-cover border border-black/20">
                                                                            </a>
                                                                        @elseif($message->type === 'video')
                                                                            <video controls
                                                                                class="rounded-lg max-h-60 w-full border border-black/20 bg-black">
                                                                                <source src="{{ $fileUrl }}">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        @elseif($message->type === 'file')
                                                                                                <a href="{{ $fileUrl }}" download target="_blank" class="flex items-center gap-3 p-3 rounded-xl transition-colors
                                                                               {{ $isMe ? 'bg-black/20 hover:bg-black/30' : 'bg-zinc-900/50 hover:bg-zinc-900' }}">

                                                                                                    <div class="w-10 h-10 rounded-full flex items-center justify-center 
                                                                                    {{ $isMe ? 'bg-white/10 text-white' : 'bg-zinc-700 text-zinc-300' }}">
                                                                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                                                                            viewBox="0 0 24 24">
                                                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                stroke-width="2"
                                                                                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                                                                            </path>
                                                                                                        </svg>
                                                                                                    </div>

                                                                                                    <div class="flex flex-col min-w-0">
                                                                                                        <span
                                                                                                            class="text-xs font-bold truncate max-w-[150px]">{{ $message->attachment }}</span>
                                                                                                        <span class="text-[10px] opacity-70 uppercase">File</span>
                                                                                                    </div>

                                                                                                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                                                            stroke-width="2"
                                                                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </a>
                                                                        @endif
                                                                    @endif
                                                                </div>

                                                                <span class="text-[10px] font-medium text-zinc-600 mt-1 px-1">
                                                                    {{ $message->created_at->format('h:i A') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                    @empty
                                        <div class="flex flex-col items-center justify-center h-full py-10 opacity-50">
                                            <p class="text-zinc-500 font-medium">No messages yet. Say hello!</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <div class="p-4 bg-black/95 backdrop-blur-xl border-t border-white/5 shrink-0 z-20 pb-6 sm:pb-4">
                                <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3 relative">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $activeFriend->id }}">

                                    <div id="file-preview" class="hidden absolute bottom-full left-0 mb-3 w-full animate-fade-in-up">
                                        <div class="bg-zinc-900/90 backdrop-blur-md border border-red-500/30 rounded-2xl p-3 shadow-2xl shadow-red-900/10 flex items-center gap-3 max-w-sm mx-auto sm:mx-0">
                                            
                                            <div class="w-10 h-10 rounded-xl bg-red-500/10 flex items-center justify-center shrink-0 border border-red-500/20">
                                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                                </svg>
                                            </div>

                                            <div class="flex-1 min-w-0">
                                                <p class="text-xs font-bold text-white truncate" id="file-name">filename.jpg</p>
                                                <p class="text-[10px] text-zinc-400 font-medium">Ready to send</p>
                                            </div>

                                            <button type="button" onclick="clearFile()" class="p-2 hover:bg-white/10 rounded-full text-zinc-400 hover:text-red-500 transition-all duration-200 group">
                                                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="group flex items-center gap-2 bg-zinc-900 border border-zinc-800 p-2 pr-2 rounded-[26px] focus-within:border-red-500/50 focus-within:ring-4 focus-within:ring-red-500/10 transition-all duration-300 shadow-lg shadow-black/50">
                                        
                                        <button type="button" onclick="document.getElementById('file-input').click()" 
                                            class="p-3 text-zinc-400 hover:text-white hover:bg-zinc-800 transition-all duration-200 rounded-full shrink-0 active:scale-95">
                                            <svg class="w-6 h-6 transform rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                            </svg>
                                        </button>

                                        <input type="file" name="attachment" id="file-input" class="hidden" onchange="handleFileSelect(this)">

                                        <input type="text" name="content" placeholder="Type a message..." 
                                            class="flex-1 bg-transparent border-none focus:ring-0 text-sm py-3 px-2 text-white placeholder-zinc-500 font-medium tracking-wide" 
                                            autocomplete="off">

                                        <button type="submit" 
                                            class="bg-red-600 hover:bg-red-500 text-white p-3 rounded-2xl transition-all duration-200 shadow-lg shadow-red-900/20 hover:shadow-red-600/30 active:scale-95 flex items-center justify-center shrink-0 group-hover:translate-x-0">
                                            <svg class="w-5 h-5 translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 5l7 7-7 7M5 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/> 
                                                </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>


                        @else
                            <div class="flex flex-col items-center justify-center h-full text-zinc-500">
                                <div class="w-20 h-20 bg-zinc-900 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
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


    @if ($conversation)
        <div id='conversationId' data-id="{{ $conversation->id }}"></div>
    @endif


    <style>
        @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #3f3f46;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #52525b;
        }
    </style>

    <script>

        const userId = {{ Auth::id() }};

        window.authProfilePhoto = "{{ asset('storage/profiles/' . Auth::user()->profile_photo) }}";
        window.activeFriendPhoto = "{{ isset($activeFriend) ? asset('storage/profiles/' . $activeFriend->profile_photo) : '' }}";

        function scrollToBottom() {
            const container = document.getElementById('messages-container');
            if (container) container.scrollTop = container.scrollHeight;
        }

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