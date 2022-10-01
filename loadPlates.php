<?php

if($_GET["option"] == "1") {
    displayPlates();
}

if($_GET["option"] == "2") {
    $namePlate = $_GET['value'];
    filterPlates($namePlate);
}

function displayPlates(){
    include "openconn.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    $query = " SELECT * FROM quikChef_plates";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    $media = 0;
    while ($row = mysqli_fetch_assoc($result)){
        $rating = $row['rating'];
        $review = $row['review'];
        if($review > 5){
            $media = $rating/$review;
        }
        else{
            $media = 0;
        }

        $english_format_number = number_format($media, 2, '.', '');

        echo "<div id='myDIV' class='col-md-6'><div class='work-img'><img src='avatar/".strval($row['avatarPlate']). "' width='350' height='350' class='img-fluid'></div>
        <div class='work-content'><div class='row'><div class='col-sm-12'><form action='buyPlate.php method='POST'>" . "<h2 id='filtrar' class='w-title'>" . $row["dishName"] .
        "</h2></form><div class='w-more'><p><b>Ingredients: </b>" . $row["ingredients"] . "</p><p><b>Number of Plates Available: </b>" .
        $row["numberPlates"] . "</p><p><b>Price: </b>" . $row["price"] . "€</p></div><div class='w-more'><span class='w-ctegory'>" .
        $row["vendor"] . "</span> | <span class='w-date'>" . $row["category"] . "</span> | <span class='w-date'>" . $english_format_number .
        "<i class='fas fa-star'></i></span></div><form action='buyPlate.php' method='POST'><button type='submit' name='comprarDish' value='" . $row["dishName"] . 
        "' class='btn button-a'><i class='fas fa-plus-circle'></i> Buy</button></form><div class='col-sm-4'><div class='col-sm-12'></div></div></div></div></a></div></div>";
    }
}

function filterPlates($name){
    include "openconn.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    $query = " SELECT * FROM quikChef_plates where dishName='$name'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    $media = 0;

    if ($num == 0){
        
    }
    while ($row = mysqli_fetch_assoc($result)){
        $rating = $row['rating'];
        $review = $row['review'];
        if($review > 5){
            $media = $rating/$review;
        }
        else{
            $media = 0;
        }

        $english_format_number = number_format($media, 2, '.', '');
        echo "<div id='myDIV' class='col-md-6'><div class='work-img'><img src='avatar/".strval($row['avatarPlate']). "' width='350' height='350' class='img-fluid'></div>
        <div class='work-content'><div class='row'><div class='col-sm-12'><form action='buyPlate.php method='POST'>" . "<h2 id='filtrar' class='w-title'>" . $row["dishName"] .
        "</h2></form><div class='w-more'><p><b>Ingredients: </b>" . $row["ingredients"] . "</p><p><b>Number of Plates Available: </b>" .
        $row["numberPlates"] . "</p><p><b>Price: </b>" . $row["price"] . "€</p></div><div class='w-more'><span class='w-ctegory'>" .
        $row["vendor"] . "</span> | <span class='w-date'>" . $row["category"] . "</span> | <span class='w-date'>" . $english_format_number .
        "<i class='fas fa-star'></i></span></div><form action='buyPlate.php' method='POST'><button type='submit' name='comprarDish' value='" . $row["dishName"] . 
        "' class='btn button-a'><i class='fas fa-plus-circle'></i> Buy</button></form><div class='col-sm-4'><div class='col-sm-12'></div></div></div></div></a></div></div>";
    }
}
?>