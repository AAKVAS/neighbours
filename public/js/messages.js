var sendMessageButton = document.getElementById('sendMessageButton');
var inputMessage = document.getElementById('inputMessage');
sendMessageButton.onclick = function() {
    alert(inputMessage.value);
}
