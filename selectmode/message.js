$(document).ready(function() {
    setInterval(function() {
        $("#chat-message").load("message.php");
    }, 1000);
    $("#chat-message").load("message.php");
});