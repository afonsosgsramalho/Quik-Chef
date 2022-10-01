<?php
include "openconn.php";
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

  <!-- Rating links -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jquery for ajax calls -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Questrial|Ubuntu&display=swap" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Fonte Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body id="page-top">

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="initialPage.php">
        <?php
          echo $_SESSION['username'];
        ?>
      </a>
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
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#about">about</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#service">services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="sell.php">sell and publish</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="buy.php">buy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" id="signin" data-toggle="modal" data-target="#signinModal"><i class="fas fa-wallet"></i></a>

            <!-- Modal -->
            <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalTitle"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="signinModalLongTitle">Transfer Money</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="addMoney.php" method="POST">
                      <div id="sendmessage">You are now signed in.</div>
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <?php
                              $username = $_SESSION['username'];
                              $balanceRequest = "select * from quikChef_user where username='$username'";
                              $result = mysqli_query($conn, $balanceRequest);
                              while ($row = mysqli_fetch_assoc($result)){
                                echo "<p><b>Your Balance: </b>" . $row['balance'] . "€</p>";
                              }
                            ?>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <p>Amount of money to transfer:</p>
                            <input type="text" name="moneyTransfer" class="form-control" id="name" placeholder="Insert the amount of money" data-msg="Please enter at least 4 chars" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn button-a">Transfer</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!-- <li class="nav-item">
            <form action="logout.php" method="POST">
              <button type="submit" name="signout_button" class="btn button-a">Sign out</button>
            </form>
          </li> -->
          <li class="nav-item">
            <!-- <a class="nav-link js-scroll" href='chat.php' id="signin" data-toggle="modal" data-target='signinModal3'><i class="fas fa-comments"></i></a> -->
            <a class="nav-link js-scroll" href='chat.php'><i class="fas fa-comments"></i></a>
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <?php
              include "openconn.php";

              $query = "select * from quikChef_avatar where user_username = '".$_SESSION['username']."' order by id desc limit 1";
              $result = mysqli_query($conn, $query);
              $num_rows = mysqli_num_rows($result);
              if ($num_rows > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<img class='rounded-circle' width='40' height='40' src='avatar/". strval($row['name']) . "' />";
                }
              }
              ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <div class="dropdown-item">
                  <label for="exampleFormControlFile1">Avatar Image</label>
                  <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <input id="botaoFiles" type="file" name="avatar" class="form-control-file" enctype="multipart/form-data">
                    <button type="submit" class="btn button-b" name="avatarSubmit">Submit</button>
                  </form>
              </div>
              <div class="dropdown-divider"></div>
              <div class="dropdown-item">
                  <button type="button" class="btn button-b"><a class="btn button-b" id="signin" data-toggle="modal" data-target="#signinModal2">My plates</a></button>
                  <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="signinModalLongTitle">My Plates</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <!-- <div class="modal-body">
                        <form action="addMoney.php" method="POST">
                          <div id="sendmessage">You are now signed in.</div>
                          <div id="errormessage"></div>
                          <div class="row">
                            <div class="col-md-12 mb-3">
                              <div class="form-group">
                                <?php
                                  // $username = $_SESSION['username'];
                                  // $balanceRequest = "select * from quikChef_user where username='$username'";
                                  // $result = mysqli_query($conn, $balanceRequest);
                                  // while ($row = mysqli_fetch_assoc($result)){
                                  //   echo "<p><b>Your Balance: </b>" . $row['balance'] . "€</p>";
                                  // }
                                ?> 
                              </div>
                            </div>
                            <div class="col-md-12 mb-3">
                              <div class="form-group">
                                <p>Insert the ammount of plates that you want to add:</p>
                                <input type="text" name="moneyTransfer" class="form-control" id="name" placeholder="Insert the amount of money" data-msg="Please enter at least 4 chars" required>
                                <div class="validation"></div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn button-a">Transfer</button>
                          </div>
                        </form>
                      </div> -->
                    </div>
                </div>
            </div>
              </div>
              <div class="dropdown-divider"></div>
              <div class="dropdown-item">
                <form action="logout.php" method="POST">
                  <button type="submit" name="signout_button" class="btn button-a">Sign out</button>
                </form>
              </div>
            </div>
          </li>
        </ul>
        <div class="modal fade" id="signinModal2" tabindex="-1" role="dialog" aria-labelledby="signinModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="signinModalLongTitle">My Plates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="updatePlate.php" method="POST">
                  <div id="sendmessage">You are now signed in.</div>
                  <div id="errormessage"></div>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <table class='table table-bordered'>
                              <tr>
                                <th>Dish Name</th>
                                <th>Number of Plates</th>
                              </tr>
                              <tr>
                        <?php
                          $username = $_SESSION['username'];
                          $query = " SELECT * FROM quikChef_plates where vendor ='$username'";
                          $result2 = mysqli_query($conn, $query);
                          $num = mysqli_num_rows($result2);
                          while ($row = mysqli_fetch_assoc($result2)){
                            echo "<tr><td>". $row["dishName"] ."</td><td>". $row["numberPlates"] ."</td></tr>";
                          }
                          echo "</table>";
                        ?>
                        <div class="validation"></div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <p>Select the dish that you want to change:</p>
                        <select name='selectedOption' class="form-control form-control-sm">
                        <?php
                          $username = $_SESSION['username'];
                          $query = "SELECT * FROM quikChef_plates WHERE vendor='$username'";
                          $result2 = mysqli_query($conn, $query);
                          $num = mysqli_num_rows($result2);
                          while ($row = mysqli_fetch_assoc($result2)){
                            echo "<option value='" . $row["dishName"] . "'>" . $row["dishName"] . "</option>";
                          }
                          echo "</select>";
                        ?>
                        <div class="validation"></div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <p>Insert the ammount of plates that you want to add</p>
                        <input type="text" class="form-control" name="plateNumber" id="subject" placeholder="Insert the ammount" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                        <div class="validation"></div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="signin_button" class="btn button-a">Change</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->
 <!--/ Intro Skew Star /-->
 <div id="home" class="intro buy-bg route bg-image">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h1 class="intro-title mb-4">Buy</h1>
          <p class="intro-subtitle"><span class="text-slider-items">Choose,Order,Eat it!</span><strong
              class="text-slider"></strong></p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->
<!--/ Section Plates /-->
  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Available Dishes
            </h3>
            <p class="subtitle-a">
              You can filter the tables in the "Filter" button, in the top right corner
            </p>
            <div class="line-mf"></div>
            <div class="col-sm-12 input-group mb-3">
              <!-- <div class="input-group-prepend">
                <select id="selectOptions" class="form-control form-control-sm">
                  <option id="optionName">Search by Dish Name</option>
                  <option id="optionEmail">Search by Dish Type</option>
                  <option id="optionUsername">Search by Price</option>
                </select>
              </div> -->
              <!-- <form class='example' action=''> -->
                <input class="form-control form-control-sm" type="text" id="myInput"  placeholder="Search for Dish Name...">
                <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
              <!-- </form> -->
            </div>
            <div class="container">
              <div class="row" id="loadPlates">

                <script>

                  function isInputEmpty() {
                    var option = 0;
                    if (document.getElementById("myInput").value == "") {
                      console.log("vazio");
                      option = 1;
                      return option;
                    }
                    console.log("cheio");
                    option = 2;
                    return option;
                  }


                  setInterval(function() {
                    // var input = document.getElementById("myInput").value;
                    // console.log('i:' + input);
                    if (isInputEmpty()==1) {
                      $(document).ready(function() {
                          $.ajax({
                            type: 'POST',
                            url: 'loadPlates.php?option=1',
                            success: function(data) {
                              $('#loadPlates').html(data); //insert text of test.php into your div
                            }
                          });
                      });
                    }
                    else if(isInputEmpty()==2){
                      var input = document.getElementById("myInput").value;
                      console.log('i:' + input);
                      $(document).ready(function() {
                          $.ajax({
                            type: 'POST',
                            url: 'loadPlates.php?value=' + input + '&option=2',
                            success: function(data) {
                              $('#loadPlates').html(data); //insert text of test.php into your div
                            }
                          });
                      });
                    }
                  }, 1300);
             
                </script>
              </div>
            </div>
            <form>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
              <script>
                // function funcaoFiltrar() {
                //   // Declare variables
                //   var select = document.getElementById("selectOptions");
                //   var selected_option = select.options[select.selectedIndex].value;

                //   console.log(selected_option);

                //   var input, filter, table, tr, td, i, txtValue;
                //   input = document.getElementById("myInput");
                //   filter = input.value.toUpperCase();
                //   table = document.getElementById("zonaFiltrar");
                //   tr = table.getElementById("filtrar");

                //   // Loop through all table rows, and hide those who don't match the search query
                //   if(selected_option == "Search by Dish Name"){
                //     for (i = 0; i < tr.length; i++) {
                //     td = tr[i].getElementsByTagName("h2")[0];
                //     txtValue = td.textContent || td.innerText;
                //     if (txtValue.toUpperCase().indexOf(filter) > -1) {
                //       tr[i].style.display = "";
                //     } else {
                //       tr[i].style.display = "none";
                //     }
                //   }
                // }
                //   else if(selected_option == "Search by Dish Type"){
                //     for (i = 0; i < tr.length; i++) {
                //     td = tr[i].getElementsByTagName("h2")[0];
                //     if (td) {
                //       txtValue = td.textContent || td.innerText;
                //       if (txtValue.toUpperCase().indexOf(filter) > -1) {
                //         tr[i].style.display = "";
                //       } else {
                //         tr[i].style.display = "none";
                //       }
                //     }
                //     }
                //   }
                //   else if(selected_option == "Search by Price"){
                //     for (i = 0; i < tr.length; i++) {
                //     td = tr[i].getElementsByTagName("h2")[0];
                //     if (td) {
                //       txtValue = td.textContent || td.innerText;
                //       if (txtValue.toUpperCase().indexOf(filter) > -1) {
                //         tr[i].style.display = "";
                //       } else {
                //         tr[i].style.display = "none";
                //       }
                //     }
                //     }
                //   }
                // }


                // $(document).ready(function(){
                //   $("#myInput").on("keyup", function() {
                //     var value = $(this).val().toLowerCase();
                //     $("#myDIV *").filter(function() {
                //       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                //     });
                //   });
                // });
              </script>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="signinModal3" tabindex="-1" role="dialog" aria-labelledby="signinModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="signinModalLongTitle">My Plates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="updatePlate.php" method="POST">
                  <div id="sendmessage">You are now signed in.</div>
                  <div id="errormessage"></div>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <table class='table table-bordered'>
                              <tr>
                                <th>Dish Name</th>
                                <th>Number of Plates</th>
                              </tr>
                              <tr>
                        <?php
                          $username = $_SESSION['username'];
                          $query = " SELECT * FROM quikChef_plates where vendor ='$username'";
                          $result2 = mysqli_query($conn, $query);
                          $num = mysqli_num_rows($result2);
                          while ($row = mysqli_fetch_assoc($result2)){
                            echo "<tr><td>". $row["dishName"] ."</td><td>". $row["numberPlates"] ."</td></tr>";
                          }
                          echo "</table>";
                        ?>
                        <div class="validation"></div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <p>Select the dish that you want to change:</p>
                        <select name='selectedOption' class="form-control form-control-sm">
                        <?php
                          $username = $_SESSION['username'];
                          $query = "SELECT * FROM quikChef_plates WHERE vendor='$username'";
                          $result2 = mysqli_query($conn, $query);
                          $num = mysqli_num_rows($result2);
                          while ($row = mysqli_fetch_assoc($result2)){
                            echo "<option value='" . $row["dishName"] . "'>" . $row["dishName"] . "</option>";
                          }
                          echo "</select>";
                        ?>
                        <div class="validation"></div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <p>Insert the ammount of plates that you want to add</p>
                        <input type="text" class="form-control" name="plateNumber" id="subject" placeholder="Insert the ammount" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                        <div class="validation"></div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="signin_button" class="btn button-a">Change</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


      

      
    </div>
  </section>
<!--/ END Section Plates /-->
  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Send Message To Us
                    </h5>
                  </div>
                  <div>
                    <form action="" method="post" role="form" class="contactForm">
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                              data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                              data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                              data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                              data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum dolorem soluta quidem
                      expedita aperiam aliquid at.
                      Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis
                      mollitia inventore?
                    </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span> 329 WASHINGTON ST BOSTON, MA 02108</li>
                      <li><span class="ion-ios-telephone"></span> (617) 557-0089</li>
                      <li><span class="ion-email"></span> contact@example.com</li>
                    </ul>
                  </div>
                  <div class="socials">
                    <ul>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-pinterest"></i></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
