const conversationId = document.querySelector("#conversationId").dataset.id;


console.log(conversationId , userId);

window.Echo.private(`conversation.${conversationId}`).listen(
    "MessageSente",
    (e) => {
        // console.log(e);

        appendMessage(e.message);
    },
);

function appendMessage(message) {
    const container = document.getElementById("messages-container");
    const isMe = message.sender_id == userId;
    
    const profilePhoto = isMe ? window.authProfilePhoto : window.activeFriendPhoto;
    
    const fileUrl = `/storage/attachments/${message.attachment}`;
    const time = new Date(message.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    const wrapper = document.createElement("div");
    wrapper.className = `flex w-full ${isMe ? 'justify-end' : 'justify-start'}`;

    let contentHtml = '';

    if (message.content) {
        contentHtml += `<p class="${message.attachment ? 'mb-2' : ''}">${message.content}</p>`;
    }

    if (message.attachment) {
        if (message.type === 'image') {
            contentHtml += `
                <a href="${fileUrl}" target="_blank">
                    <img src="${fileUrl}" class="rounded-lg max-h-60 w-auto object-cover border border-black/20">
                </a>`;
        } else if (message.type === 'video') {
            contentHtml += `
                <video controls class="rounded-lg max-h-60 w-full border border-black/20 bg-black">
                    <source src="${fileUrl}">
                </video>`;
        } else if (message.type === 'file') {
            const iconBg = isMe ? 'bg-white/10 text-white' : 'bg-zinc-700 text-zinc-300';
            const hoverBg = isMe ? 'bg-black/20 hover:bg-black/30' : 'bg-zinc-900/50 hover:bg-zinc-900';
            
            contentHtml += `
                <a href="${fileUrl}" download target="_blank" class="flex items-center gap-3 p-3 rounded-xl ${hoverBg} transition-colors">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center ${iconBg}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="text-xs font-bold truncate max-w-[150px]">${message.attachment}</span>
                        <span class="text-[10px] opacity-70 uppercase">File</span>
                    </div>
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                </a>`;
        }
    }

    wrapper.innerHTML = `
        <div class="flex max-w-[75%] ${isMe ? 'flex-row-reverse' : 'flex-row'} items-end gap-3">
            <img src="${profilePhoto}" class="w-8 h-8 rounded-full object-cover border border-zinc-700 mb-1 hidden sm:block shrink-0">
            <div class="flex flex-col ${isMe ? 'items-end' : 'items-start'}">
                <div class="px-4 py-3 rounded-2xl shadow-md text-sm leading-relaxed overflow-hidden 
                    ${isMe ? 'bg-red-600 text-white rounded-br-none border border-red-500' : 'bg-zinc-800 text-zinc-200 border border-zinc-700 rounded-bl-none'}">
                    ${contentHtml}
                </div>
                <span class="text-[10px] font-medium text-zinc-600 mt-1 px-1">
                    ${time}
                </span>
            </div>
        </div>
    `;

    container.appendChild(wrapper);
    container.scrollTop = container.scrollHeight;
}