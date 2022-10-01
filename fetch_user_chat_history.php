<?php

//fetch_user_chat_history.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM quikChef_user 
WHERE username = '".$_SESSION['username']."' 
";

$result = mysqli_query($connect, $query);
$userDetails = mysqli_fetch_assoc($result);

$user_id = $userDetails['user_id'];

echo fetch_user_chat_history($user_id, $_POST['to_user_id'], $connect);

?>