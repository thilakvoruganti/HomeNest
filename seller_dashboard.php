<?php
require("db.php");

// need to seller to access dashboard
session_start();


$username = $_SESSION['seller_user_id'];

// Query properties of current logged in seller
$sql = "SELECT * from cards WHERE seller='$username'";


?>
<!DOCTYPE html>
<html lang="en">

    <html>
    <head>
        <title>HomeQuest Real Estate: Seller dashboard</title>
        <link href="style_index.css" rel="stylesheet"> 
        <link href="style_seller.css" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!-- Menu  -->
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
         <div class="home">
            <a href="index.php">Home</a>
        </div>
        <div class="topnav" style="width: 100%">
            
            <a href="#" class="active">Dashboard</a>
             
        </div>
        <br>
        <p style="text-align: center; font-size: 30px;position: absolute; left: 43%; top: 150px; color: whitesmoke;">Welcome, Seller!</p>
    <div class="full">
        <div style="margin-left: 10% ;"></div>
       <?php
// connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=tvoruganti1', 'tvoruganti1', 'tvoruganti1');

// query to retrieve the data from the database
$sql = "SELECT * FROM card";
$stmt = $pdo->query($sql);

// loop through the data and create a card for each row
foreach ($stmt as $row) {
    $image_path = 'img/' . $row['image'];

    // echo $image_path;

    echo '<div class="flip-card">';
    echo '<div class="flip-card-inner">';
    echo '<div class="flip-card-front">';
   echo '<img src="' . $image_path . '">';
    echo '</div>';
    echo '<div class="flip-card-back">';
    echo '<h2><b> Apartment: </b>' . $row['name'] . '</h2>';
    echo '<p><b> Address: </b>' . $row['address'] . '</p>';
    echo '<p><b>Age: </b>' . $row['age'] . '</p>';
    echo '<p><b>No. of Beds: </b>' . $row['bed'] . '</p>';
    echo '<p><b>No. of Baths: </b>' . $row['ad'] . '</p>';
    echo '<p><b>Garden available: </b>' . $row['garden'] . '</p>';
    echo '<p><b>Parking available: </b>' . $row['pa'] . '</p>';
    echo '<p><b>Price: </b>' . $row['tax'] . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>
<div class="flip-card1">
 <a href="form.html"><img src="img/plus.jpg"></a>
</div>

<!-- CSS styles for the card -->
<style>
.flip-card1{
    background-color: #DCBF7D;
    margin-top: 20%;
    height: 400px;
    width: 300px;
    margin-right: 20px;
}
.flip-card1 img{
    margin-top: 43%;
    margin-left: 30%;
}
.flip-card {
    margin-top: 20%;
    
    margin-right: 20px ;
  position: relative;
    /* position: absolute; */
    background-color: transparent;
    width: 300px;
    height: 400px;
    border: 1px solid #f1f1f1;
    perspective: 1000px;
    top: 40%;
    padding: 10px 10px 10 px 10px;

}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
   line-height: 1em;
  width: 100%;
  height: 100%;
  text-align: left;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
  color: black;
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  color: black;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #bbb;
  color: black;
}
.flip-card-front img{
height: 400px;
width: 300px;
}
.flip-card-back p{
    text-align: left;
    color: #2C332B;
}

/* Style the back side */
.flip-card-back {
  background-color: #DCBF7D;
  color: #2C332B;
  text-align: left;
   line-height: 1em;
  transform: rotateY(180deg);
}
</style>

    </div>

    </body>

</html>