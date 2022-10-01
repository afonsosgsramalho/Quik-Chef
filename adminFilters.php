<?php

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  session_start();

  if($_GET["table"] == "users") {
    filterUsersTableAdmin();
  }

  if($_GET["table"] == "plates") {
    filterPlatesAdminTable();
  }

  if($_GET["table"] == "history") {
    filterHistoryAdminTable();
  }

  if($_GET["table"] == "stats"){
    filterStatsAdminTable();
  }

  function filterUsersTableAdmin() {
    include "openconn.php";
    if (isset($_POST['countryButton'])){
      $query = " SELECT * FROM quikChef_user ORDER BY country";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      $value = 0;
      echo "<table class='table table-bordered' id='myTable'>
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
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        foreach ($row as $value){
          $value = $value + 1;
        }
        echo $value;
        echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"]
        ."</td><td>". $row["username"] ."</td><td>". $row["sexo"] ."</td><td>". $row["birth"]
              ."</td><td>". $row["country"] ."</td><td>". $row["district"] ."</td><td>". $row["county"]
            ."</td><td>". $row["adress"] ."</td><td>". $row["type_user"] ."</td>"."</tr>";
      }
        echo "</table>";
    }
    elseif (isset($_POST['districtButton'])) {
      $query = " SELECT * FROM quikChef_user ORDER BY district";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      $value = 0;
      echo "<table class='table table-bordered' id='myTable'>
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
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        foreach ($row as $value){
          $value = $value + 1;
        }
        echo $value;
        echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"]
        ."</td><td>". $row["username"] ."</td><td>". $row["sexo"] ."</td><td>". $row["birth"]
              ."</td><td>". $row["country"] ."</td><td>". $row["district"] ."</td><td>". $row["county"]
            ."</td><td>". $row["adress"] ."</td><td>". $row["type_user"] ."</td>"."</tr>";
      }
        echo "</table>";
    }
    elseif (isset($_POST['countyButton'])) {
      $query = " SELECT * FROM quikChef_user ORDER BY county";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      $value = 0;
      echo "<table class='table table-bordered' id='myTable'>
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
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        foreach ($row as $value){
          $value = $value + 1;
        }
        echo $value;
        echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"]
        ."</td><td>". $row["username"] ."</td><td>". $row["sexo"] ."</td><td>". $row["birth"]
              ."</td><td>". $row["country"] ."</td><td>". $row["district"] ."</td><td>". $row["county"]
            ."</td><td>". $row["adress"] ."</td><td>". $row["type_user"] ."</td>"."</tr>";
      }
        echo "</table>";
    }
    else {
      $query = " SELECT * FROM quikChef_user";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      $value = 0;
      echo "<table class='table table-bordered' id='myTable'>
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
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        $value = $value + 1;
        echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"]
        ."</td><td>". $row["username"] ."</td><td>". $row["sexo"] ."</td><td>". $row["birth"]
              ."</td><td>". $row["country"] ."</td><td>". $row["district"] ."</td><td>". $row["county"]
            ."</td><td>". $row["adress"] ."</td><td>". $row["type_user"] ."</td>"."</tr>";
      }
        echo "</table>";
    }
    return $value;
  }

  function filterPlatesAdminTable() {
    include "openconn.php";
    if (isset($_POST['countryButton'])){
      $query = " SELECT * FROM quikChef_plates";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      echo "<table class='table table-bordered' id='myTable2'>
      <tr>
        <th>Vendor</th>
        <th>Dish Name</th>
        <th>Category</th>
        <th>Ingredients</th>
        <th>Number of Plates</th>
        <th>Image</th>
        <th>Available Date</th>
        <th>Price</th>
      </tr>";
      $resultado = filterUsersTableAdmin();
      echo $resultado;
      while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
        ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["rating"]
              ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
      }
        echo "</table>";
    }
    elseif (isset($_POST['districtButton'])) {
      $query = " SELECT * FROM quikChef_plates";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      echo "<table class='table table-bordered' id='myTable2'>
      <tr>
        <th>Vendor</th>
        <th>Dish Name</th>
        <th>Category</th>
        <th>Ingredients</th>
        <th>Number of Plates</th>
        <th>Image</th>
        <th>Available Date</th>
        <th>Price</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
        ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["rating"]
              ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
      }
        echo "</table>";
    }
    elseif (isset($_POST['countyButton'])) {
      $query = " SELECT * FROM quikChef_plates";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
        ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $row["rating"]
              ."</td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
      }
        echo "</table>";
    }
    else {
      $query = " SELECT * FROM quikChef_plates";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      echo "<table class='table table-bordered' id='myTable2'>
      <tr>
        <th>Vendor</th>
        <th>Dish Name</th>
        <th>Category</th>
        <th>Ingredients</th>
        <th>Number of Plates</th>
        <th>Rating</th>
        <th>Available Date</th>
        <th>Price</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        if($row['review'] >= 5){
          $rating = $row['rating']/$row['review'];
          $english_format_number = number_format($rating, 2, '.', '');
        }
        else{
          $rating = 0;
          $english_format_number = number_format($rating, 2, '.', '');
        }
        echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["category"]
        ."</td><td>". $row["ingredients"] ."</td><td>". $row["numberPlates"] ."</td><td>". $english_format_number
              ."<i class='fas fa-star'></i></td><td>". $row["availableDate"] ."</td><td>". $row["price"] ."€ </td></tr>";
      }
        echo "</table>";
    }

  }

  function filterHistoryAdminTable() {
    include "openconn.php";
    if (isset($_POST['countryButton'])){
      $query = " SELECT * FROM quikChef_history";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      echo "<table class='table table-bordered' id='myTable3'>
      <tr>
        <th>Vendor</th>
        <th>Dish Name</th>
        <th>Buyer</th>
        <th>Date</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["buyer"]
        . "</td><td>". $row['date']. "</td></tr>";
      }
        echo "</table>";
    }
    elseif (isset($_POST['districtButton'])) {
      $query = " SELECT * FROM quikChef_history";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      echo "<table class='table table-bordered' id='myTable3'>
      <tr>
        <th>Vendor</th>
        <th>Dish Name</th>
        <th>Buyer</th>
        <th>Date</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["buyer"]
        . "</td><td>". $row['date']. "</td></tr>";
      }
        echo "</table>";
    }
    elseif (isset($_POST['countyButton'])) {
      $query = " SELECT * FROM quikChef_history";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      echo "<table class='table table-bordered' id='myTable3'>
      <tr>
        <th>Vendor</th>
        <th>Dish Name</th>
        <th>Buyer</th>
        <th>Date</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["buyer"]
        . "</td><td>". $row['date']. "</td></tr>";
      }
        echo "</table>";
    }
    else {
      $query = " SELECT * FROM quikChef_history";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      echo "<table class='table table-bordered' id='myTable3'>
      <tr>
        <th>Vendor</th>
        <th>Dish Name</th>
        <th>Buyer</th>
        <th>Date</th>
      </tr>";
      while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>". $row["vendor"] ."</td><td>". $row["dishName"] ."</td><td>". $row["buyer"]
        . "</td><td>". $row['date']. "</td></tr>";
      }
        echo "</table>";
    }

  }

  function filterStatsAdminTable(){
    include "openconn.php";

    $query = " SELECT * FROM quikChef_user";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    $value = 0;

    $query2 = " SELECT * FROM quikChef_plates";
    $result2 = mysqli_query($conn, $query2);
    $num2 = mysqli_num_rows($result2);
    $value2 = 0;
    $sumPrice = 0;

    $query3 = " SELECT * FROM quikChef_history";
    $result3 = mysqli_query($conn, $query3);
    $num3 = mysqli_num_rows($result3);
    $value3 = 0;
    echo "<table class='table table-bordered' id='myTable4'>
    <tr>
      <th>Number of Clients</th>
      <th>Number of Plates</th>
      <th>Number of Sales</th>
      <th>Average Price</th>
    </tr>";
    while ($row = mysqli_fetch_assoc($result)){
      $value = $value + 1;
    }
    while ($row = mysqli_fetch_assoc($result2)){
      $value2 = $value2 + 1;
      $sumPrice = $sumPrice + $row['price'];
    }
    while ($row = mysqli_fetch_assoc($result3)){
      $value3 = $value3 + 1;
    }

    $avaragePrice = $sumPrice/$value2;
    echo "<tr><td>" . $value . "</td><td>" . $value2 . "</td><td>" . $value3 . "</td><td>" . $avaragePrice . "€</td></tr>";
    echo "</table>";
  }

?>