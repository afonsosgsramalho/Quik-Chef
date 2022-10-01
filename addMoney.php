<?php
// Estabelece uma ligação com a base de dados usando o programa openconn.php
// A variável $conn é inicializada com a ligação estabelecida
include "openconn.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); 

$moneyTransfer = mysqli_real_escape_string($conn, $_POST['moneyTransfer']);
$username = mysqli_real_escape_string($conn, $_SESSION['username']);

$balanceRequest = "select * from quikChef_user where username='$username'";
$result = mysqli_query($conn, $balanceRequest);
//$num = mysqli_num_rows($result);
while ($row = mysqli_fetch_assoc($result)){
	$moneyTransfer = $moneyTransfer + $row['balance'];
}
// Verifica se o email e username já estão a ser utiizados
// if($num_dishName == 1){
//   echo "This dish has been published already";
// }

// else {
  $register = "update quikChef_user set balance='$moneyTransfer' where username='$username'";
  mysqli_query($conn, $register);
  echo "<script type='text/javascript'>
  alert('The money has been transfered to your account.');
  window.location.href = 'initialPage.php';
  </script>";
// }

// Termina a ligação com a base de dados
mysqli_close($conn);
// header('location:initialPage.php');

?>
