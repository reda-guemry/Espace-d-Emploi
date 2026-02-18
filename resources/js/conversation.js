const conversationId = document.querySelector('#conversationId').dataset.id ; 

// console.log('rane connecter ');
console.log(conversationId);


window.Echo.private(`conversation.${conversationId}`).listen(
    "MessageSent",
    (e) => {
        console.log(e);
    },
);
