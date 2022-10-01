<?php
// Estabelece uma ligação com a base de dados usando o programa openconn.php
// A variável $conn é inicializada com a ligação estabelecida
include "openconn.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); 

$username = mysqli_real_escape_string($conn, $_SESSION['username']);
$dishName = mysqli_real_escape_string($conn, $_POST['selectedOption']);
$plateNumber = mysqli_real_escape_string($conn, $_POST['plateNumber']);

$plateRequest = "SELECT * FROM quikChef_plates WHERE vendor='$username' AND dishName='$dishName'";
$result = mysqli_query($conn, $plateRequest);

echo "<p>plateNumber: " . $plateNumber . "</p>";
echo "<p>dishName: " . $dishName . "</p>";

while ($row = mysqli_fetch_assoc($result)){
    $updatePlates = $plateNumber + $row['numberPlates'];
}

$register = "update quikChef_plates set numberPlates='$updatePlates' where vendor='$username' and dishName='$dishName'";
mysqli_query($conn, $register);
echo "Registration Sucessful";

mysqli_close($conn);
header('location:initialPage.php');
?>