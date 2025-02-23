<?php
include '../connection/connection.php';
session_start();

$query = "SELECT users.First_Name, global_chat.Message 
        FROM global_chat 
        JOIN users
        ON global_chat.User_ID = users.User_ID;";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_assoc($result)){

?>
<style>
    .chat-message {
    margin-bottom: 5px;
    padding: 5px;
    border-radius: 5px;
    display: block;
    width: fit-content;
}
</style>
    <div class="chat-message">
        <strong><?php echo htmlspecialchars($row['First_Name']); ?>:</strong> 
        <?php echo nl2br(htmlspecialchars($row['Message'])); ?>
    </div>
<?php
}
?>