<?php
include "openconn.php";
//database_connection.php
$dbhost = "appserver-01.alunos.di.fc.ul.pt";
$dbuser = "asw001";
$dbpass = "aswAGR2020";
$dbname = "asw001";
// Cria a ligação à BD
// $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Verifica a ligação à BD
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}


// function fetch_user_last_activity($user_id, $connect)
// {
//  $query = "
//  SELECT * FROM login_details 
//  WHERE user_id = '$user_id' 
//  ORDER BY last_activity DESC 
//  LIMIT 1
//  ";
//  $statement = $connect->prepare($query);
//  $statement->execute();
//  $result = $statement->fetchAll();
//  foreach($result as $row)
//  {
//   return $row['last_activity'];
//  }
// }
function fetch_user_last_activity($user_id, $connect){
    $query = "
    SELECT * FROM login_details 
    WHERE user_id = '$user_id' 
    ORDER BY last_activity DESC 
    LIMIT 1
    ";
    // $statement = $connect->prepare($query);
    // $statement->execute();
    // $result = $statement->fetchAll();
    $result = mysqli_query($connect, $query);
    foreach($result as $row){
        return $row['last_activity'];
    }
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect){
    $query = "
    SELECT * FROM chat_message 
    WHERE (from_user_id = '".$from_user_id."' 
    AND to_user_id = '".$to_user_id."') 
    OR (from_user_id = '".$to_user_id."' 
    AND to_user_id = '".$from_user_id."') 
    ORDER BY timestamp DESC
    ";
    // $statement = $conn->prepare($query);
    $result = mysqli_query($connect, $query);

    $output = '<ul class="list-unstyled">';
    foreach($result as $row){
        $user_name = '';
        if($row["from_user_id"] == $from_user_id){
            $user_name = '<b class="text-success">You</b>';
        }
        else{
            $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
        }
        $output .= '
        <li style="border-bottom:1px dotted #ccc">
        <p>'.$user_name.' - '.$row["chat_message"].'
            <div align="right">
            - <small><em>'.$row['timestamp'].'</em></small>
            </div>
        </p>
        </li>
        ';
    }
    $output .= '</ul>';
    return $output;
}

function get_user_name($user_id, $connect){
    $query = "SELECT username FROM quikChef_user WHERE user_id = '$user_id'";
    $result = mysqli_query($connect, $query);

    // $statement = $connect->prepare($query);
    // $statement->execute();
    // $result = $statement->fetchAll();
    foreach($result as $row){
        return $row['username'];
    }
}
?>