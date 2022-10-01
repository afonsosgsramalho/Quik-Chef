<?php
// Estabelece uma ligação com a base de dados usando o programa openconn.php
// A variável $conn é inicializada com a ligação estabelecida
include "openconn.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$sexo = mysqli_real_escape_string($conn, $_POST['sexo']);
$birth = mysqli_real_escape_string($conn, $_POST['birth']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$county = mysqli_real_escape_string($conn, $_POST['county']);
$address = mysqli_real_escape_string($conn, $_POST['address']);

//echo "<script>console.log('$username');</script>"
if(isset($_POST['vendor'])){ // Checkbox vendor is selected
  $type = "vendor";
}
if(isset($_POST['consumer'])){ // Checkbox consumer is selected
  $type = "consumer";
}
$password = mysqli_real_escape_string($conn, $_POST['password']);

$hash = password_hash($password, PASSWORD_BCRYPT);
//$2y$10$7jTTtxe6yda31

$query_username = " select * from quikChef_user where username = '$username'";
$result_username = mysqli_query($conn, $query_username);
$num_username = mysqli_num_rows($result_username);

$query_email = " select * from quikChef_user where email = '$email'";
$result_email = mysqli_query($conn, $query_email);
$num_email = mysqli_num_rows($result_email);

// Verifica se o email e username já estão a ser utiizados
if($num_username == 1){
  echo "<script type='text/javascript'>
  alert('Username Already Taken');
  window.location.href = 'index.php';
  </script>";
}
elseif ($num_email == 1) {
  echo "<script type='text/javascript'>
  alert('Email Already Taken');
  window.location.href = 'index.php';
  </script>";
}
else {
  if (validateAge($birth)) {
    $birthConfirmed = $birth;
    $register = "insert into quikChef_user(firstname, lastname, email, username, sexo, birth, country, district, county, adress, type_user, passwd) values('$firstname', '$lastname', '$email', '$username', '$sexo', '$birthConfirmed', '$country', '$district', '$county', '$address', '$type', '$hash')";
    mysqli_query($conn, $register);
    echo "<script type='text/javascript'>
    alert('Registration Successful');
    window.location.href = 'index.php';
    </script>";
    // header('location:index.php');

  }
  else {
    echo "<script type='text/javascript'>
    alert('Invalid Age. Must have 18+');
    window.location.href = 'index.php';
    </script>";
  }
}

// validate birthday
function validateAge($birthday, $age = 18)
{
  // $birthday can be UNIX_TIMESTAMP or just a string-date.
  if(is_string($birthday)) {
    $birthday = strtotime($birthday);
  }

  // check
  // 31536000 is the number of seconds in a 365 days year.
  if(time() - $birthday < $age * 31536000)  {
    return false;
  }

  return true;
}

// Termina a ligação com a base de dados
mysqli_close($conn);

?>
