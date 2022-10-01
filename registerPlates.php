<?php
// Estabelece uma ligação com a base de dados usando o programa openconn.php
// A variável $conn é inicializada com a ligação estabelecida
include "openconn.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); 

// Termina a ligação com a base de dados
if(isset($_POST['publish_button']) && isset($_FILES['avatarPlate'])){

	$vendor = mysqli_real_escape_string($conn, $_SESSION['username']);
	$dishName = mysqli_real_escape_string($conn, $_POST['dishName']);
	$category = mysqli_real_escape_string($conn, $_POST['category']);
	$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
	$numberPlates = mysqli_real_escape_string($conn, $_POST['numberPlates']);
	$availableDate = mysqli_real_escape_string($conn, $_POST['availableDate']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);

	$plate = $_FILES['avatarPlate'];
	$avatarPlate = $_FILES['avatarPlate'];
	$avatarPlateName = $_FILES['avatarPlate']['name'];
	$avatarPlateTmpName = $_FILES['avatarPlate']['tmp_name'];
	$avatarPlateSize = $_FILES['avatarPlate']['size'];
	$avatarPlateError = $_FILES['avatarPlate']['error'];
	$avatarPlateType = $_FILES['avatarPlate']['type'];
	$avatarPlateExt = explode('.', $avatarPlateName);
	$avatarPlateActualExt = strtolower(end($avatarPlateExt));

	$allowed = array('jpg', 'jpeg', 'png'); //types of files allowed to upload

	if (in_array($avatarPlateActualExt, $allowed)) {
		if ($avatarPlateError == 0) {
		  if ($avatarPlateSize < 1000000){
		    $avatarPlateNameNew = $_SESSION['username'].$dishName.".".$avatarPlateActualExt; 
		    $avatarPlateDestination = 'avatar/'.$avatarPlateNameNew;
			move_uploaded_file($avatarPlateTmpName, $avatarPlateDestination);
			if (isDateAvailable($availableDate)) {
				$availableDateConfirmed = $availableDate;
				$registerPlates = "INSERT INTO quikChef_plates(vendor, dishName, category, ingredients, numberPlates, availableDate, price, avatarPlate) VALUES('$vendor', '$dishName', '$category', '$ingredients', '$numberPlates', '$availableDateConfirmed', '$price', '$avatarPlateNameNew')";
				mysqli_query($conn, $registerPlates);
				echo "<script type='text/javascript'>
				alert('Plate registed successfuly');
				window.location.href = 'initialPage.php';
				</script>";
			}
			else {
				echo "<script type='text/javascript'>
				alert('Error. Something went wrong.');
				window.location.href = 'initialPage.php';
				</script>";

				
			}
		    //header("Location: initialPage.php");
		  }
		  else {
			echo "<script type='text/javascript'>
			alert('File is too big.');
			window.location.href = 'initialPage.php';
			</script>";
		  }
		}
		else {
			echo "<script type='text/javascript'>
			alert('Error. Something went wrong.');
			window.location.href = 'initialPage.php';
			</script>";
		}
	}
	else {
		echo "<script type='text/javascript'>
		alert('You can't upload images of this type.');
		window.location.href = 'initialPage.php';
		</script>";
	}
}

function isDateAvailable($date) {
	if (time() <= strtotime($date)) {
		return true;
	}
	return false;
}

mysqli_close($conn);
//header('location:initialPage.php');

?>
