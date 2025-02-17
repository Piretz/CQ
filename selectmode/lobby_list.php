<?php
include '../connection/connection.php';
session_start();

$query = "SELECT * FROM queue WHERE type = 'Owner' AND status ='Waiting'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0 ){
?>
<thead>
    <tr>
        <th>Status</th>
        <th>Lobby ID</th>
        <th>Lobby Master</th>
        <th>Language</th>
    </tr>
</thead>
<?php
while ($rows = mysqli_fetch_assoc($result)){
    $id = $rows['player_id'];
    $owner_query = "SELECT * FROM users WHERE User_ID = $id";
    $owner_result = mysqli_query($con ,$owner_query);
    $name = mysqli_fetch_assoc($owner_result);
    $owner_name = $name['First_Name']
?>
<tbody>
    <tr class="join-lobby-row" onclick="window.location.href='join_lobby.php?id=<?php echo $rows['queue_id'] ?>'">
        <td class="join-Status"><?php echo $rows['status'] ?></td>
        <td class="join-ID"><?php echo $rows['queue_id'] ?></td>
        <td class="join-user-name"><?php echo $owner_name ?></td>
        <td class="join-Status"><?php echo $rows['language'] ?></td>
    </tr>
</tbody>
<?php
} } else { ?>

<<thead>
<thead>
    <tr>
        <th>No Open Lobby</th>
    </tr>
</thead>
<tbody>
    <tr class="join-lobby-row">
        <td class="join-Status">No Open Lobby</td>
    </tr>
</tbody>

<?php
}
?>