window.Echo.private(`conversation.${conversationId}`).listen(
    "MessageSent",
    (e) => {
        console.log(e);
    },
);
