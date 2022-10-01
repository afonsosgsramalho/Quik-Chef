<?php

include "openconn.php";

session_start();

if (!isset($_SESSION['adminLoggedIn']))
{
    //if the value was not set, you redirect the user to your login page
    header('location: adminLogin.php');
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

  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="page-top">

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top"><?php echo $_SESSION['adminUsername'] ?></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
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

<!--/ User Tables Inicio /-->
            <form>
                <!-- <div class="dropdown">
                  <select class="form-control form-control-sm">
                    <option>Search by Name</option>
                    <option>Search by E-mail</option>
                    <option>Search by Username</option>
                    <option>Search by Type</option>
                  </select>
                </div>

              <input type="text" id="myInput" class="form-control" onkeyup="funcaoFiltrar()" placeholder="Search for names.."> -->
              <div class="col-sm-6 input-group mb-3">
                  <h4 class="title-b">
                    Users:
                  </h4>
              </div>
              <div class="col-sm-6 input-group mb-3">
                <div class="input-group-prepend">
                  <select id="selectOptions" class="form-control form-control-sm" onclick="funcaoFiltrar()">
                    <option id="optionName">Search by Name</option>
                    <option id="optionEmail">Search by E-mail</option>
                    <option id="optionUsername">Search by Username</option>
                    <option id="optionType">Search by Type</option>
                  </select>
                </div>
                <input class="form-control form-control-sm" type="text" id="myInput" onkeyup="funcaoFiltrar()"  placeholder="Type..">
              </div>

              <table class="table table-bordered" id="myTable">
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>E-mail</th>
                  <th>Username</th>
                  <th>Gender</th>
                  <th>Birth</th>
                  <th>Country</th>
                  <th>District</th>
                  <th>County</th>
                  <th>Address</th>
                  <th>Type</th>
                </tr>
                <tr>
                  <?php

                  // if (isset($_POST['countryButton'])){
                  //   $query = " SELECT * FROM quikChef_user ORDER BY country";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"]
                  //     ."</td><td>". $row["username"] ."</td><td>". $row["sexo"] ."</td><td>". $row["birth"]
                  //           ."</td><td>". $row["country"] ."</td><td>". $row["district"] ."</td><td>". $row["county"]
                  //          ."</td><td>". $row["adress"] ."</td><td>". $row["type"] ."</td>"."</tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // elseif (isset($_POST['districtButton'])) {
                  //   $query = " SELECT * FROM quikChef_user ORDER BY district";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"]
                  //     ."</td><td>". $row["username"] ."</td><td>". $row["sexo"] ."</td><td>". $row["birth"]
                  //           ."</td><td>". $row["country"] ."</td><td>". $row["district"] ."</td><td>". $row["county"]
                  //          ."</td><td>". $row["adress"] ."</td><td>". $row["type"] ."</td>"."</tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // elseif (isset($_POST['countyButton'])) {
                  //   $query = " SELECT * FROM quikChef_user ORDER BY county";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"]
                  //     ."</td><td>". $row["username"] ."</td><td>". $row["sexo"] ."</td><td>". $row["birth"]
                  //           ."</td><td>". $row["country"] ."</td><td>". $row["district"] ."</td><td>". $row["county"]
                  //          ."</td><td>". $row["adress"] ."</td><td>". $row["type"] ."</td>"."</tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // else {
                  //   $query = " SELECT * FROM quikChef_user";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"]
                  //     ."</td><td>". $row["username"] ."</td><td>". $row["sexo"] ."</td><td>". $row["birth"]
                  //           ."</td><td>". $row["country"] ."</td><td>". $row["district"] ."</td><td>". $row["county"]
                  //          ."</td><td>". $row["adress"] ."</td><td>". $row["type"] ."</td>"."</tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  ?>

                  <script>

                    function isInputEmpty() {
                      if (document.getElementById("myInput").value == "") {
                        return true;
                      }
                      return false;
                    }

                    setInterval(function() {
                      if (isInputEmpty()) {
                        $(document).ready(function() {
                            $.ajax({
                              type: 'POST',
                              url: 'adminFilters.php?table=users',
                              success: function(data) {
                                $('#myTable').html(data); //insert text of test.php into your div
                              }
                            });
                        });
                      }
                      else {
                        funcaoFiltrar();
                      }
                    }, 1300);

                    function funcaoFiltrar() {
                      // Declare variables
                      var select = document.getElementById("selectOptions");
                      var selected_option = select.options[select.selectedIndex].value;

                      var input, filter, table, tr, td, i, txtValue;
                      input = document.getElementById("myInput");
                      filter = input.value.toUpperCase();
                      table = document.getElementById("myTable");
                      tr = table.getElementsByTagName("tr");

                      // Loop through all table rows, and hide those who don't match the search query
                      if(selected_option == "Search by Name"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[0];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by E-mail"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[2];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Username"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[3];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Type"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[10];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                    }
                  </script>
                </tr>
              </table>
            </form>
<!--/ User Tables Fim/-->


<!--/ Plates Tables Inicio /-->
            <form>
                <!-- <div class="dropdown">
                  <select class="form-control form-control-sm">
                    <option>Search by Name</option>
                    <option>Search by E-mail</option>
                    <option>Search by Username</option>
                    <option>Search by Type</option>
                  </select>
                </div>

              <input type="text" id="myInput" class="form-control" onkeyup="funcaoFiltrar()" placeholder="Search for names.."> -->
              <div class="col-sm-6 input-group mb-3">
                  <h4 class="title-b">
                    Plates:
                  </h4>
              </div>
              <div class="col-sm-6 input-group mb-3">
                <div class="input-group-prepend">
                  <select id="selectOptions2" class="form-control form-control-sm" onclick="funcaoFiltrar2()">
                    <option id="optionName">Search by Vendor</option>
                    <option id="optionEmail">Search by Dish Name</option>
                    <option id="optionUsername">Search by Category</option>
                    <option id="optionType">Search by Price</option>
                  </select>
                </div>
                <input class="form-control form-control-sm" type="text" id="myInput2" onkeyup="funcaoFiltrar2()"  placeholder="Type..">
              </div>

              <table class="table table-bordered" id="myTable2">
                <tr>
                  <th>Vendor</th>
                  <th>Dish Name</th>
                  <th>Category</th>
                  <th>Ingredients</th>
                  <th>Number of Plates</th>
                  <th>Image</th>
                  <th>Available Date</th>
                  <th>Price</th>
                </tr>
                <tr>
                  <?php

                  // if (isset($_POST['countryButton'])){
                  //   $query = " SELECT * FROM quikChef_plates";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
                  //     ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["image"]
                  //           ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // elseif (isset($_POST['districtButton'])) {
                  //   $query = " SELECT * FROM quikChef_plates";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
                  //     ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["image"]
                  //           ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // elseif (isset($_POST['countyButton'])) {
                  //   $query = " SELECT * FROM quikChef_plates";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
                  //     ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["image"]
                  //           ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // else {
                  //   $query = " SELECT * FROM quikChef_plates";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
                  //     ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["image"]
                  //           ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  ?>

                  <script>
                    function isInputEmpty() {
                      if (document.getElementById("myInput2").value == "") {
                        return true;
                      }
                      return false;
                    }

                    setInterval(function() {
                      if (isInputEmpty()) {
                        $(document).ready(function() {
                            $.ajax({
                              type: 'POST',
                              url: 'adminFilters.php?table=plates',
                              success: function(data) {
                                $('#myTable2').html(data); //insert text of test.php into your div
                              }
                            });
                        });
                      }
                      else {
                        funcaoFiltrar2();
                      }
                    }, 1300);
                    
                    function funcaoFiltrar2() {
                      // Declare variables
                      var select = document.getElementById("selectOptions2");
                      var selected_option = select.options[select.selectedIndex].value;

                      console.log(selected_option);

                      var input, filter, table, tr, td, i, txtValue;
                      input = document.getElementById("myInput2");
                      filter = input.value.toUpperCase();
                      table = document.getElementById("myTable2");
                      tr = table.getElementsByTagName("tr");

                      // Loop through all table rows, and hide those who don't match the search query
                      if(selected_option == "Search by Vendor"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[0];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Dish Name"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[1];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Category"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[2];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Price"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[7];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                    }

                  </script>

                </tr>
              </table>
            </form>
<!--/ User Tables Fim /-->


<!--/ History Plates Inicio /-->
            <form>
                <!-- <div class="dropdown">
                  <select class="form-control form-control-sm">
                    <option>Search by Name</option>
                    <option>Search by E-mail</option>
                    <option>Search by Username</option>
                    <option>Search by Type</option>
                  </select>
                </div>

              <input type="text" id="myInput" class="form-control" onkeyup="funcaoFiltrar()" placeholder="Search for names.."> -->
              <div class="col-sm-6 input-group mb-3">
                  <h4 class="title-b">
                    History:
                  </h4>
              </div>
              <div class="col-sm-6 input-group mb-3">
                <div class="input-group-prepend">
                  <select id="selectOptions3" class="form-control form-control-sm" onclick="funcaoFiltrar3()">
                    <option id="optionName">Search by Vendor</option>
                    <option id="optionEmail">Search by Dish Name</option>
                    <option id="optionUsername">Search by Buyer</option>
                  </select>
                </div>
                <input class="form-control form-control-sm" type="text" id="myInput3" onkeyup="funcaoFiltrar3()"  placeholder="Type..">
              </div>

              <table class="table table-bordered" id="myTable3">
                <tr>
                  <th>Vendor</th>
                  <th>Dish Name</th>
                  <th>Buyer</th>
                </tr>
                <tr>
                  <?php

                  // if (isset($_POST['countryButton'])){
                  //   $query = " SELECT * FROM quikChef_history";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["buyer"]
                  //     . "</td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // elseif (isset($_POST['districtButton'])) {
                  //   $query = " SELECT * FROM quikChef_history";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["buyer"]
                  //     . "</td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // elseif (isset($_POST['countyButton'])) {
                  //   $query = " SELECT * FROM quikChef_history";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["buyer"]
                  //     . "</td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // else {
                  //   $query = " SELECT * FROM quikChef_history";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["buyer"]
                  //     . "</td></tr>";
                  //   }
                  //     echo "</table>";
                  // }

                  ?>
                  <script>
                    function isInputEmpty() {
                      if (document.getElementById("myInput3").value == "") {
                        return true;
                      }
                      return false;
                    }

                    setInterval(function() {
                      if (isInputEmpty()) {
                        $(document).ready(function() {
                            $.ajax({
                              type: 'POST',
                              url: 'adminFilters.php?table=history',
                              success: function(data) {
                                $('#myTable3').html(data); //insert text of test.php into your div
                              }
                            });
                        });
                      }
                      else {
                        funcaoFiltrar3();
                      }
                    }, 1300);

                    function funcaoFiltrar3() {
                      // Declare variables
                      var select = document.getElementById("selectOptions3");
                      var selected_option = select.options[select.selectedIndex].value;

                      console.log(selected_option);

                      var input, filter, table, tr, td, i, txtValue;
                      input = document.getElementById("myInput3");
                      filter = input.value.toUpperCase();
                      table = document.getElementById("myTable3");
                      tr = table.getElementsByTagName("tr");

                      // Loop through all table rows, and hide those who don't match the search query
                      if(selected_option == "Search by Vendor"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[0];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Dish Name"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[1];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Buyer"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[2];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                    }

                  </script>

                </tr>
              </table>
            </form>
<!--/ History Tables Fim /-->

            <form>
                <!-- <div class="dropdown">
                  <select class="form-control form-control-sm">
                    <option>Search by Name</option>
                    <option>Search by E-mail</option>
                    <option>Search by Username</option>
                    <option>Search by Type</option>
                  </select>
                </div>

              <input type="text" id="myInput" class="form-control" onkeyup="funcaoFiltrar()" placeholder="Search for names.."> -->
              <div class="col-sm-6 input-group mb-3">
                  <h4 class="title-b">
                    Stats:
                  </h4>
              </div>
              <div class="col-sm-6 input-group mb-3">
                <div class="input-group-prepend">
                  <select id="selectOptions2" class="form-control form-control-sm" onclick="funcaoFiltrar2()">
                    <option id="optionName">Search by Vendor</option>
                    <option id="optionEmail">Search by Dish Name</option>
                    <option id="optionUsername">Search by Category</option>
                    <option id="optionType">Search by Price</option>
                  </select>
                </div>
                <input class="form-control form-control-sm" type="text" id="myInput4" onkeyup="funcaoFiltrar2()"  placeholder="Type..">
              </div>

              <table class="table table-bordered" id="myTable4">
                <tr>
                  <th>Number of Clients</th>
                  <th>Number of Plates</th>
                  <th>Number of Sales</th>
                  <th>Avarage Price</th>
                </tr>
                <tr>
                  <?php

                  // if (isset($_POST['countryButton'])){
                  //   $query = " SELECT * FROM quikChef_plates";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
                  //     ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["image"]
                  //           ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // elseif (isset($_POST['districtButton'])) {
                  //   $query = " SELECT * FROM quikChef_plates";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
                  //     ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["image"]
                  //           ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // elseif (isset($_POST['countyButton'])) {
                  //   $query = " SELECT * FROM quikChef_plates";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
                  //     ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["image"]
                  //           ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  // else {
                  //   $query = " SELECT * FROM quikChef_plates";
                  //   $result = mysqli_query($conn, $query);
                  //   $num = mysqli_num_rows($result);
                  //   while ($row = mysqli_fetch_assoc($result)){
                  //     echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
                  //     ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["image"]
                  //           ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
                  //   }
                  //     echo "</table>";
                  // }
                  ?>

                  <script>
                    function isInputEmpty() {
                      if (document.getElementById("myInput4").value == "") {
                        return true;
                      }
                      return false;
                    }

                    setInterval(function() {
                      if (isInputEmpty()) {
                        $(document).ready(function() {
                            $.ajax({
                              type: 'POST',
                              url: 'adminFilters.php?table=stats',
                              success: function(data) {
                                $('#myTable4').html(data); //insert text of test.php into your div
                              }
                            });
                        });
                      }
                      else {
                        funcaoFiltrar2();
                      }
                    }, 1300);
                    
                    function funcaoFiltrar2() {
                      // Declare variables
                      var select = document.getElementById("selectOptions2");
                      var selected_option = select.options[select.selectedIndex].value;

                      console.log(selected_option);

                      var input, filter, table, tr, td, i, txtValue;
                      input = document.getElementById("myInput2");
                      filter = input.value.toUpperCase();
                      table = document.getElementById("myTable2");
                      tr = table.getElementsByTagName("tr");

                      // Loop through all table rows, and hide those who don't match the search query
                      if(selected_option == "Search by Vendor"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[0];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Dish Name"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[1];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Category"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[2];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                      else if(selected_option == "Search by Price"){
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[7];
                          if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                    }

                  </script>

                </tr>
              </table>
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
