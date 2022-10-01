<?php

//fetch_user.php

include "openconn.php";
include "database_connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$query = "
SELECT * FROM quikChef_user 
WHERE username != '".$_SESSION['username']."' 
";

$result = mysqli_query($conn, $query);

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>Username</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
';

while ($row = mysqli_fetch_assoc($result)){
    $status = '';
    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
    if($user_last_activity > $current_timestamp)
    {
     $status = '<span class="label label-success">Online</span>';
    }
    else
    {
     $status = '<span class="label label-danger">Offline</span>';
    }
    $output .= '
    <tr>
        <td>'.$row['username'].'</td>
        <td>' . $status . '</td>
        <td><button type="button" class="btn btn-info btn-xs start_chat" id="start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;


// $statement = $conn->prepare($query);

// $statement->execute();

// $result = $statement->fetch_all();

// $output = '
// <table class="table table-bordered table-striped">
//  <tr>
//   <td>Username</td>
//   <td>Status</td>
//   <td>Action</td>
//  </tr>
// ';

// foreach($result as $row)
// {
//  $output .= '
//  <tr>
//   <td>'.$row['username'].'</td>
//   <td></td>
//   <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
//  </tr>
//  ';
// }

// $output .= '</table>';

// echo $output;

?>