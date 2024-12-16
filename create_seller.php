<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create tables PHP Script</title>
</head>

<body>
<?php
require("db.php");

// Use "IF NOT EXISTS" to avoid duplicate table creation errors
$sql = "CREATE TABLE IF NOT EXISTS buyer_data (
    buyer_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    buyer_name VARCHAR(30) NOT NULL,
    buyer_user_id VARCHAR(20) NOT NULL,
    buyer_email VARCHAR(30) NOT NULL,
    buyer_password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'buyer_data' created successfully or already exists.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

    <div>
        <a href="signup.php"><input type="button" id="btn1" value="Home"></a>
    </div>
</body>

</html>