<?php
include "database_connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$query = "
SELECT * FROM quikChef_user 
WHERE username = '".$_SESSION['username']."' 
";

$result = mysqli_query($connect, $query);
$userDetails = mysqli_fetch_assoc($result);

$user_id = $userDetails['user_id'];

$to_user_id = mysqli_real_escape_string($connect, $_POST['to_user_id']);
$chat_message = mysqli_real_escape_string($connect, $_POST['chat_message']);
$from_user_id = $user_id;

$status = '1';

// $data = array(
//     ':to_user_id'  => $_POST['to_user_id'],
//     ':from_user_id'  => $user_id,
//     ':chat_message'  => $_POST['chat_message'],
//     ':status'   => '1'
//    );
   
$query2 = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status) 
VALUES ('$to_user_id', '$from_user_id', '$chat_message', '$status')
";

mysqli_query($connect, $query2);

$statement = $connect->prepare($query2);

// if($statement->execute($data)){
    echo fetch_user_chat_history($user_id, $to_user_id, $connect);
// }
?>