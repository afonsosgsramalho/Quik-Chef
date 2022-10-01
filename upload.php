<?php

include "openconn.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_POST['avatarSubmit'])){
  $avatar = $_FILES['avatar'];
  $avatarName = $_FILES['avatar']['name'];
  $avatarTmpName = $_FILES['avatar']['tmp_name'];
  $avatarSize = $_FILES['avatar']['size'];
  $avatarError = $_FILES['avatar']['error'];
  $avatarType = $_FILES['avatar']['type'];
  $avatarExt = explode('.', $avatarName);
  $avatarActualExt = strtolower(end($avatarExt));

  $allowed = array('jpg', 'jpeg', 'png'); //types of files allowed to upload

  if (in_array($avatarActualExt, $allowed)) {
    if ($avatarError == 0) {
      if ($avatarSize < 1000000){
        $avatarNameNew = uniqid().".".$avatarActualExt; 
        $avatarDestination = 'avatar/'.$avatarNameNew;
        move_uploaded_file($avatarTmpName, $avatarDestination);
        $insertAvatar = " insert into quikChef_avatar(name, user_username) values('$avatarNameNew', '" . $_SESSION['username'] . "')";
        mysqli_query($conn, $insertAvatar);
        header("Location: initialPage.php");
      }
      else {
        echo "Your file is to big!";
      }
    }
    else {
      echo "There was an error uploading your file!";
    }
  }
  else {
    echo "You cannot upload files of this type!";
  }
}

?>
