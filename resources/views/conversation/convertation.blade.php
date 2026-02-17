<x-app-layout>
    <div class="h-screen bg-slate-100/50">
        <div class="max-w-7xl mx-auto h-full px-4 py-6">
            <div class="grid grid-cols-12 gap-6 h-[calc(100vh-100px)]">

                <aside class="col-span-4 lg:col-span-3 h-full">
                    <div class="h-full bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden flex flex-col">
                        <div class="p-5 border-b border-slate-100">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Messages</h2>
                            </div>
                        </div>

                        <div class="flex-1 overflow-y-auto p-3 space-y-1">
                            @forelse($friends as $friend)
                                @php
                                    $isActive = isset($activeFriend) && $activeFriend->id === $friend->id;
                                @endphp

                                <a href="{{ route('conversation', $friend->id) }}"
                                    class="flex items-center gap-3 p-3 rounded-2xl transition-all {{ $isActive ? 'bg-indigo-50 border border-indigo-100 shadow-sm' : 'hover:bg-slate-50' }}">
                                    
                                    <div class="relative">
                                        <img src="{{ asset('storage/profiles/' . $friend->profile_photo) }}" 
                                             alt="{{ $friend->first_name }}"
                                             class="w-12 h-12 rounded-2xl object-cover border-2 {{ $isActive ? 'border-indigo-200' : 'border-transparent' }}">
                                        
                                        <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <p class="font-bold {{ $isActive ? 'text-indigo-900' : 'text-slate-700' }} truncate capitalize">
                                            {{ $friend->first_name }} {{ $friend->last_name }}
                                        </p>
                                        <p class="text-xs {{ $isActive ? 'text-indigo-500' : 'text-slate-500' }} truncate">
                                            Click to chat
                                        </p>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-10 text-slate-400 text-sm">
                                    No friends found.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </aside>

                <main class="col-span-8 lg:col-span-9 h-full">
                    <div class="h-full bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden flex flex-col relative">

                        @if(isset($activeFriend))
                            <div class="px-6 py-4 border-b border-slate-100 bg-white/80 backdrop-blur-sm sticky top-0 z-10">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/profiles/' . $activeFriend->profile_photo) }}" 
                                         class="w-12 h-12 rounded-2xl object-cover shadow-sm border border-slate-200">
                                    
                                    <div class="flex-1">
                                        <p class="font-black text-slate-800 text-lg leading-none mb-1 capitalize">
                                            {{ $activeFriend->first_name }} {{ $activeFriend->last_name }}
                                        </p>
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Active Now</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="messages-container" class="flex-1 overflow-y-auto px-6 py-8 bg-slate-50/50 scroll-smooth">
                                <div class="space-y-6">
                                    
                                    @foreach($messages as $message)
                                        @php
                                            $isMe = $message->sender_id === Auth::id();
                                        @endphp

                                        <div class="flex w-full {{ $isMe ? 'justify-end' : 'justify-start' }}">
                                            <div class="flex max-w-[70%] {{ $isMe ? 'flex-row-reverse' : 'flex-row' }} items-end gap-2">
                                                
                                                <img src="{{ asset('storage/profiles/' . ($isMe ? Auth::user()->profile_photo : $activeFriend->profile_photo)) }}" 
                                                     class="w-8 h-8 rounded-full object-cover border border-slate-200 mb-1 hidden sm:block">

                                                <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }}">
                                                    <div class="px-5 py-3 rounded-2xl shadow-sm text-sm leading-relaxed
                                                        {{ $isMe 
                                                            ? 'bg-indigo-600 text-white rounded-br-none' 
                                                            : 'bg-white text-slate-700 border border-slate-100 rounded-bl-none' 
                                                        }}">
                                                        
                                                        @if($message->content)
                                                            <p>{{ $message->content }}</p>
                                                        @endif

                                                        @if($message->attachment)
                                                            <div class="mt-2">
                                                                <img src="{{ asset('storage/attachments/' . $message->attachment) }}" class="rounded-lg max-h-40 object-cover border border-white/20">
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <span class="text-[10px] font-medium text-slate-400 mt-1 px-1">
                                                        {{ $message->created_at->format('h:i A') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="p-4 bg-white border-t border-slate-100">
                                <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $activeFriend->id }}">

                                    <div id="file-preview" class="hidden items-center gap-2 p-3 bg-indigo-50 rounded-2xl border border-indigo-100 mx-1">
                                        <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs font-bold text-indigo-700 px-2 truncate max-w-xs" id="file-name"></span>
                                        <button type="button" onclick="clearFile()" class="ml-auto p-1 text-slate-400 hover:text-red-500 transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                        </button>
                                    </div>

                                    <div class="flex items-center gap-3 bg-slate-50 p-2 rounded-3xl border border-slate-200 focus-within:border-indigo-400 transition-all focus-within:ring-4 focus-within:ring-indigo-100">
                                        <button type="button" onclick="document.getElementById('file-input').click()" class="p-3 text-slate-400 hover:text-indigo-600 hover:bg-white transition-all rounded-full">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                            </svg>
                                        </button>

                                        <input type="file" name="attachment" id="file-input" class="hidden" onchange="handleFileSelect(this)">

                                        <input type="text" name="content" placeholder="Type a message to {{ $activeFriend->first_name }}..." class="flex-1 bg-transparent border-none focus:ring-0 text-sm py-3 text-slate-700 placeholder-slate-400" autocomplete="off">

                                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl font-bold text-sm transition-all shadow-lg shadow-indigo-200 hover:shadow-indigo-300 active:scale-95">
                                            Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                        
                        @else
                            <div class="flex flex-col items-center justify-center h-full text-slate-400">
                                <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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