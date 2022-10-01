<?php
// Estabelece uma ligação com a base de dados usando o programa openconn.php
// A variável $conn é inicializada com a ligação estabelecida
include "openconn.php";
include "database_connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = "SELECT * from quikChef_user where username = '$username'";
$result = mysqli_query($conn, $query);
$num_username = mysqli_num_rows($result);

if($num_username == 0){
	echo "<script type='text/javascript'>
	alert('Wrong Username or Password');
	window.location.href = 'index.php';
	</script>";
}
while ($row = mysqli_fetch_assoc($result)) {
	if (password_verify($password, $row['passwd'])) {
		$_SESSION['loggedIn'] = true;
		$_SESSION['username'] = $row['username'];
		$sub_query = "
		INSERT INTO login_details 
		(user_id) 
		VALUES ('".$row['user_id']."')
		";
		$result2 = mysqli_query($connect, $sub_query);

		$sub_query2 = "SELECT * FROM login_details WHERE user_id='".$row['user_id']."'";
		$result3 = mysqli_query($connect, $sub_query2);
		while($row2 = mysqli_fetch_assoc($result3)){
			$login_details_id = $row2['login_details_id'];
			// $_SESSION['login_details_id'] = $connect->lastInsertId();
			// $login_details_id = $connect->lastInsertId();
		}
		// $statement = $connect->prepare($sub_query);
		// $statement->execute()

		// $_SESSION['login_details_id'] = $connect->lastInsertId();
		  header("location: initialPage.php");
	}
	else {
		echo "<script type='text/javascript'>
		alert('Wrong Username or Password');
		window.location.href = 'index.php';
		</script>";
		// header("location: index.php");
	}
}


/*if ($num == 1){
  $_SESSION['loggedIn'] = true;
  $_SESSION['username'] = $username;
  header("location: initialPage.php");
}
else {
  header("location: index.php");
}
*/
// Termina a ligação com a base de dados
mysqli_close($conn);

?>
