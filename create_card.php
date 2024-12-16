<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create tables PHP Script</title>
</head>

<body style="text-align: center;">
<?php
require("db.php");

// Drop the existing table if it exists
$conn->query("DROP TABLE IF EXISTS card");

// SQL to create the updated 'card' table
$sql = "CREATE TABLE IF NOT EXISTS card (
    card_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    seller_id INT(6) UNSIGNED NULL,
    address VARCHAR(255),
    age INT,
    bed INT,
    ad INT,
    garden VARCHAR(255),
    pa VARCHAR(255),
    tax INT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (seller_id) REFERENCES seller_data(seller_id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'card' created successfully.";
} else {
    echo "Error creating 'card' table: " . $conn->error;
}

$conn->close();
?>






    <div>
        <a href="signup.php"><input type="button" id="btn1" value="Home"></a>
    </div>
</body>

</html>