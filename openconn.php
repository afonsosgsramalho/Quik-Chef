<?php
$dbhost = "appserver-01.alunos.di.fc.ul.pt";
$dbuser = "asw001";
$dbpass = "aswAGR2020";
$dbname = "asw001";

// Cria a ligação à BD
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Verifica a ligação à BD
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// function fetch_user_chat_history($from_user_id, $to_user_id, $conn){
//     $query = "
//     SELECT * FROM chat_message 
//     WHERE (from_user_id = '".$from_user_id."' 
//     AND to_user_id = '".$to_user_id."') 
//     OR (from_user_id = '".$to_user_id."' 
//     AND to_user_id = '".$from_user_id."') 
//     ORDER BY timestamp DESC
//     ";
//     // $statement = $conn->prepare($query);
//     $result = mysqli_query($conn, $query);

//     $output = '<ul class="list-unstyled">';
//     foreach($result as $row){
//         $user_name = '';
//         if($row["from_user_id"] == $from_user_id){
//             $user_name = '<b class="text-success">You</b>';
//         }
//         else{
//             $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $conn).'</b>';
//         }
//         $output .= '
//         <li style="border-bottom:1px dotted #ccc">
//         <p>'.$user_name.' - '.$row["chat_message"].'
//             <div align="right">
//             - <small><em>'.$row['timestamp'].'</em></small>
//             </div>
//         </p>
//         </li>
//         ';
//     }
//     $output .= '</ul>';
//     return $output;
// }

?>
