<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drop Users table PHP Script</title>
</head>

<body>
<?php
session_start(); // Start the session
require("db.php");

// Ensure the user is logged in
if (!isset($_SESSION['seller_id'])) {
    die("Error: User not logged in."); // Stop execution if session is not set
}

$seller_id = $_SESSION['seller_id']; // Retrieve seller_id from session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get form data
  $address = $_POST['address'];
  $age = $_POST['age'];
  $bed = $_POST['bed'];
  $ad = $_POST['ad'];
  $garden = $_POST['garden'];
  $pa = $_POST['pa'];
  $tax = $_POST['tax'];

  // Get file data
  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];

  // Set upload directory
  $upload_dir = 'img/';

  // Move file to upload directory
  move_uploaded_file($file_tmp, $upload_dir . $file_name);

  // Insert data into database
  $sql = "INSERT INTO card (seller_id, address, age, bed, ad, garden, pa, tax, image)
          VALUES ('$seller_id', '$address', '$age', '$bed', '$ad', '$garden', '$pa', '$tax', '$file_name')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
<div>
    <a href="index.php"><input type="button" id="btn1" value="Home"></a>
</div>

</body>

</html>