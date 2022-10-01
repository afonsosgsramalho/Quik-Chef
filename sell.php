<?php
session_start();
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
              Sell and Publish
            </h3>
            <p class="subtitle-a">
              Please complete all the required fields
            </p>
            <div class="line-mf"></div>
            <form action="registerPlates.php" method="POST" enctype="multipart/form-data">
                <div id="sendmessage">You are now signed up.</div>
                <div id="errormessage"></div>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <p>Dish Name</p>
                        <input type="text" name="dishName" class="form-control" id="name" placeholder="Dish Name"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                        <div class="validation"></div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <p>Category</p>
                        <div class="input-group-prepend">
                            <select name="category" id="selectOptions" class="form-control form-control-sm">
                                <option id="italian">Italian</option>
                                <option id="indian">Indian</option>
                                <option id="asian">Asian</option>
                                <option id="traditional">Traditional</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <p>Ingredients</p>
                    <div class="form-group">
                        <textarea name="ingredients" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <p>Number of Plates</p>
                    <div class="form-group">
                      <input type="text" name="numberPlates" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                    <p>Image</p>
                        <div class="custom-file">
                            <input type="file" name="avatarPlate" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01" enctype="multipart/form-data" required> 
                            <!-- <input type="file" name="avatarPlate" class="fcustom-file-input" enctype="multipart/form-data"> -->
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <p>Available Date</p>
                    <div class="form-group">
                    <input type="text" name="availableDate" class="form-control" id="name" placeholder="year/month/date" data-rule="maxlen:1" data-msg="Please enter just 1 char"required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <p>Price</p>
                    <div class="form-group">
                      <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                    </div>
                </div>
                <!-- <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <p>Price</p>
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div> -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="publish_button" class="btn button-a">Publish</button>
                </div>
            </form>
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
