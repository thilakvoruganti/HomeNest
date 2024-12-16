<?php
$conn = new mysqli("localhost", "tvoruganti1", "tvoruganti1", "tvoruganti1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seller_name = $_POST['seller_name'];
    $seller_user_id = $_POST['seller_user_id'];
    $seller_email = $_POST['seller_email'];
    $seller_password = $_POST['seller_password'];
    
    // Use prepared statements
    $stmt = $conn->prepare("INSERT INTO seller_data (seller_name, seller_user_id, seller_email, seller_password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $seller_name, $seller_user_id, $seller_email, $seller_password);

    if ($stmt->execute()) {
        echo "Seller Data Inserted successfully!\n";
        header("location: login.php");
    } else {
        echo "Error inserting Seller data: " . $stmt->error;
    }

    $stmt->close();
    $result = $conn->query("SELECT * FROM seller_data");

}

$conn->close();
?>