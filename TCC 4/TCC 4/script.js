function sendMessage() {
    var messageInput = document.getElementById("message-input");
    var messageText = messageInput.value.trim();

    if (messageText === "") {
        return; 
    }

    var chatBox = document.getElementById("chat-box");
    var messageContainer = document.createElement("div");
    messageContainer.className = "message-container";

    var senderName = document.createElement("div");
    senderName.className = "sender-name";
    senderName.textContent = "Você"; 
    messageContainer.appendChild(senderName);

    var messageElement = document.createElement("div");
    messageElement.className = "message";
    messageElement.textContent = messageText;
    messageContainer.appendChild(messageElement);

    chatBox.appendChild(messageContainer);

    messageInput.value = "";

    chatBox.scrollTop = chatBox.scrollHeight;
}
