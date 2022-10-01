<?php
// Estabelece uma ligação com a base de dados usando o programa openconn.php
// A variável $conn é inicializada com a ligação estabelecida
include "openconn.php"; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); 

$username = mysqli_real_escape_string($conn, $_SESSION['username']);

$balanceRequest = "select * from quikChef_user where username='$username'";
$result = mysqli_query($conn, $balanceRequest);

$dishName = mysqli_real_escape_string($conn, $_POST['comprarDish']);

$dishString = "select * from quikChef_plates where dishName='$dishName'";
$dishRequest = mysqli_query($conn,$dishString);
$dishResult = mysqli_fetch_assoc($dishRequest);

$dishPrice = $dishResult['price'];
$dishPlates = $dishResult['numberPlates'];
$dishPlates = $dishPlates - 1;

$user = mysqli_fetch_assoc($result);
$userBalance = $user['balance'];
$userBalance = $userBalance - $dishPrice;

$vendor = $dishResult['vendor'];

if ($userBalance > 0){
    $updateUser = "update quikChef_user set balance='$userBalance' where username='$username'";
    mysqli_query($conn, $updateUser);
    // echo "Registration Successful";
    $updateHistory = "insert into quikChef_history(vendor, dishName, buyer) values ('$vendor', '$dishName', '$username')";
    mysqli_query($conn, $updateHistory);
}
else{
    // echo "You do not have enough balance to buy this plate.";
    echo "<script type='text/javascript'>
    alert('You do not have enough balance to buy this plate');
    window.location.href = 'buy.php';
    </script>";

}

if ($dishPlates > 0){
    $updatePlate = "update quikChef_plates set numberPlates='$dishPlates' where dishName='$dishName'";
    mysqli_query($conn, $updatePlate);
    // echo "Registration Successful";
}
else{
    $updatePlate = "delete from quikChef_plates where dishName='$dishName'";
    mysqli_query($conn, $updatePlate);
    echo "<script type='text/javascript'>
    alert('There are no more plates.');
    window.location.href = 'buy.php';
    </script>";
}

// Termina a ligação com a base de dados
mysqli_close($conn);
// header('location:initialPage.php');
?>
<?php
// session_start();
if (!isset($_SESSION['loggedIn']))
{
    //if the value was not set, you redirect the user to your login page
    header('location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>QuikChef</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/953a4737fa.js" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Questrial|Ubuntu&display=swap" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/styleAdmin.css" rel="stylesheet">
</head>

<body id="page-top">

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a name="username" class="navbar-brand js-scroll" href="initialPage.php"><?php echo $_SESSION['username'] ?></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll" href="initialPage.php">home</a>
          </li>
        </ul>
    </div>
  </nav>
  <!--/ Nav End /-->

  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Rating
            </h3>
            <p class="subtitle-a">
              Please rate the Dish you have just ordered and the cooker
            </p>
            <div class="line-mf"></div>
                <div id="sendmessage">You are now signed up.</div>
                <div id="errormessage"></div>
                <div class="row">
                  <form action="calculateRating.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Rate the Dish: <b name='dishName' value=<?php echo $dishName; ?>><?php echo $dishName; ?></b></label>
                        <select name='dishRate' class="form-control form-control-sm" id="exampleFormControlSelect1">
                          <option id='1dish'>1</option>
                          <option id='2dish'>2</option>
                          <option id='3dish'>3</option>
                          <option id='4dish'>4</option>
                          <option id='5dish'>5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Rate the Vendor: <b name='cookerName' value=<?php echo $user['username']; ?>><?php echo $user['username']; ?></b></label>
                        <select name='cookerRate' class="form-control form-control-sm" id="exampleFormControlSelect1">
                          <option id='1user'>1</option>
                          <option id='2user'>2</option>
                          <option id='3user'>3</option>
                          <option id='4user'>4</option>
                          <option id='5user'>5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Insert the number of Plates:</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="15">
                      </div>
                    </div>
                    <?php
                      $cookerName = $user['username'];

                      $_SESSION['cookerName'] = $cookerName;
                      $_SESSION['dishNameRate'] = $dishName;
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="publish_button" class="btn button-a">Publish</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
    </div>
  </section>
  <!--/ Section Contact-footer End /-->


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>

</html>