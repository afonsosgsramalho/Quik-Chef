<?php
// Estabelece uma ligação com a base de dados usando o programa openconn.php
// A variável $conn é inicializada com a ligação estabelecida
include "openconn.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$adminUsername = mysqli_real_escape_string($conn, $_POST['adminUsername']);
$adminPassword = mysqli_real_escape_string($conn, $_POST['adminPassword']);

$query = " select * from quikChef_admin where username = '$adminUsername' and passwd = '$adminPassword'";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);

if ($num == 1){
  $_SESSION['adminUsername'] = $adminUsername;
  $_SESSION['adminLoggedIn'] = true;
  header("location: adminPanel.php");
}
else {
  header("location: admin.php");
}

// Termina a ligação com a base de dados
mysqli_close($conn);

?>
