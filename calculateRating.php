<?php
// Estabelece uma ligação com a base de dados usando o programa openconn.php
// A variável $conn é inicializada com a ligação estabelecida
include "openconn.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); 

$username = mysqli_real_escape_string($conn, $_SESSION['username']);


$dishRate = mysqli_real_escape_string($conn, $_POST['dishRate']);
$userRate = mysqli_real_escape_string($conn, $_POST['cookerRate']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

$cookerName = $_SESSION['cookerName'];
$dishName = $_SESSION['dishNameRate'];

if($quantity > 1){
    $balanceRequest = "select * from quikChef_user where username='$username'";
    $resultMoney = mysqli_query($conn, $balanceRequest);
    $user = mysqli_fetch_assoc($resultMoney);

    $userBalance = $user['balance'];

    $request = "select * from quikChef_plates where dishName='$dishName'";
    $dishRequest = mysqli_query($conn,$request);
    $dishResult = mysqli_fetch_assoc($dishRequest);

    $dishPrice = $dishResult['price'];
    $dishPlates = $dishResult['numberPlates'];

    $calculatedQuantity = $quantity - 1;
    $dishPlates = $dishPlates - $calculatedQuantity; 

    $finalPrice = $calculatedQuantity * $dishPrice;
    $userBalance = $userBalance - $finalPrice;

    if ($userBalance > 0 && $dishPlates > 0){
        $updateUser = "update quikChef_user set balance='$userBalance' where username='$username'";
        mysqli_query($conn, $updateUser);

        $request2 = "update quikChef_plates set numberPlates='$dishPlates' where dishName='$dishName'";
        mysqli_query($conn, $request2);

        echo "<script type='text/javascript'>
        alert('You have bought '" . $quantity ." plates of ". $dishName .".');
        window.location.href = 'buy.php';
        </script>";
    }
    else if($dishPlates <= 0){
        $updateUser = "update quikChef_user set balance='$userBalance' where username='$username'";
        mysqli_query($conn, $updateUser);

        $updatePlate = "delete from quikChef_plates where dishName='$dishName'";
        mysqli_query($conn, $updatePlate);
    }
    else{
        // echo "You do not have enough balance to buy this plate.";
        echo "<script type='text/javascript'>
        alert('You do not have enough balance to buy this plate.');
        window.location.href = 'buy.php';
        </script>";
    }

    $request2 = "update quikChef_plates set numberPlates='$dishPlates' where dishName='$dishName'";
    mysqli_query($conn, $request2);

}
else{

}

// $dishName = mysqli_real_escape_string($conn, $_POST['dishName']);
// $user = mysqli_real_escape_string($conn, $_POST['cookerName']);

$userRequest = "select * from quikChef_user where username='$cookerName'";
$result = mysqli_query($conn, $userRequest);
$numReview = 0;
while ($row = mysqli_fetch_assoc($result)){
    $userRate = $userRate + $row['rating'];
    $numReview = $row['review'] + 1;
    $media = $userRate/$numReview;
}

$dishRequest = "select * from quikChef_plates where dishName='$dishName'";
$result2 = mysqli_query($conn, $dishRequest);
$numReview2 = 0;
while ($row2 = mysqli_fetch_assoc($result2)){
    $dishRate = $dishRate + $row2['rating'];
    $numReview2 = $row2['review'] + 1;
    $media2 = $dishRate/$numReview2;
}

// echo '<p>cookerName:' . $cookerName . '</p>';
// echo '<p>dishName:' . $dishName . '</p>';
// echo '<p>dishRate:' . $dishRate . '</p>';
// echo '<p>userRate:' . $userRate . '</p>';

$register = "update quikChef_user set rating='$userRate' where username='$cookerName'";
mysqli_query($conn, $register);

$register2 = "update quikChef_user set review='$numReview' where username='$cookerName'";
mysqli_query($conn, $register2);

$register3 = "update quikChef_plates set rating='$dishRate' where dishName='$dishName'";
mysqli_query($conn, $register3);

$register4 = "update quikChef_plates set review='$numReview2' where dishName='$dishName'";
mysqli_query($conn, $register4);

echo "Registration Successful";

mysqli_close($conn);
header('location:initialPage.php');

?>