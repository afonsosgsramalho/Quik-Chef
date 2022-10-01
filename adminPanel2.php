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
      <a class="navbar-brand js-scroll" href="#page-top">QuikChef Admin</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <form action="" method="POST">
              <select class="form-control">
                  <option>Filter</option>
                  <option>
                    <button type="button" class="btn btn-outline-dark">Country</button>
                  </option>
                  <option>
                    <button type="button" class="btn btn-outline-dark">District</button>
                  </option>
                  <option>
                    <button type="button" class="btn btn-outline-dark">County</button>
                  </option>
                  <option>
                    <button type="button" class="btn btn-outline-dark">Age</button>
                  </option>
                </select>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Tables
            </h3>
            <p class="subtitle-a">
              You can filter the tables in the "Filter" button, in the top right corner
            </p>
            <div class="line-mf"></div>
            <form>
              <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
              <input type="text" name="search" value="Filter"><br><br>

              <table>
                <tr>First Name</tr>
                <tr>Last Name</tr>
                <tr>E-mail</tr>
                <tr>Username</tr>
                <tr>Gender</tr>
                <tr>Birth</tr>
                <tr>Country</tr>
                <tr>District</tr>
                <tr>County</tr>
                <tr>Address</tr>
                <tr>Type</tr>
              </table>

              <?php

                include "openconn.php";

                $query = " select * from quikChef_user";
                $result = mysqli_query($conn, $query);
                $num = mysqli_num_rows($result);

                if ($num > 0){
                echo "<table>";
                echo "<thead><tr><th>First Name</th><th>Last Name</th><th>E-mail</th><th>Username</th><th>Gender</th><th>Birth</th><th>Country</th><th>District</th><th>County</th><th>Address</th><th>Type</th>";

                while ($row = mysqli_fetch_assoc($result)){
                  echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"]
                ."</td><td>". $row["username"] ."</td><td>". $row["sexo"] ."</td><td>". $row["birth"]
                      ."</td><td>". $row["country"] ."</td><td>". $row["district"] ."</td><td>". $row["county"]
                      ."</td><td>". $row["adress"] ."</td><td>". $row["type"] ."</td><td>". $row["password"] ."</td></tr>";
                    }
                echo "</table>";

              ?>
                            
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-6 col-md-5">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>DevFolio</strong>. All Rights Reserved</p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
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
