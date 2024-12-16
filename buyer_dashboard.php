<?php
session_start();
require("db.php");

// Initialize filters
$min_price = $_GET['min_price'] ?? 0;
$max_price = $_GET['max_price'] ?? PHP_INT_MAX;
$bedrooms = $_GET['bedrooms'] ?? 0;

// Fetch properties with optional filtering
$sql = "SELECT * FROM card WHERE pa BETWEEN $min_price AND $max_price AND bed >= $bedrooms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $properties = $result->fetch_all(MYSQLI_ASSOC); // Fetch all properties
} else {
    $properties = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
    <!-- Include CSS -->
    <link href="style_index.css" rel="stylesheet">
    <link href="style_seller.css" rel="stylesheet">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    header h1 {
        margin: 0;
        font-size: 24px;
    }

    nav a {
        color: white;
        text-decoration: none;
        margin-left: 15px;
        font-weight: bold;
    }

    nav a:hover {
        text-decoration: underline;
    }

    .filter-form {
        margin: 20px auto;
        text-align: center;
        padding: 15px;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 80%;
        margin-top:150px;
    }

    .filter-form input, .filter-form button {
        padding: 8px;
        margin: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .filter-form button {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    .filter-form button:hover {
        background-color: #45a049;
    }

    .property-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin: 20px auto;
        width: 80%;
    }

    .property {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
        padding: 15px;
    }

    .property img {
        max-width: 100%;
        height: 200px;
        object-fit: cover;
        margin-bottom: 10px;
        border-radius: 4px;
    }

    .property-details p {
        margin: 5px 0;
        font-size: 14px;
    }

    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px;
        margin-top: 20px;
    }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Buyer Dashboard</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <!-- Filter Form -->
    <div class="filter-form">
        <form method="GET" action="buyer_dashboard.php">
            <label for="min_price">Min Price:</label>
            <input type="number" name="min_price" id="min_price" value="<?= htmlspecialchars($min_price) ?>">

            <label for="max_price">Max Price:</label>
            <input type="number" name="max_price" id="max_price" value="<?= htmlspecialchars($max_price) ?>">

            <label for="bedrooms">Bedrooms:</label>
            <input type="number" name="bedrooms" id="bedrooms" value="<?= htmlspecialchars($bedrooms) ?>">

            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Properties List -->
    <div class="property-container">
        <?php if (!empty($properties)): ?>
            <?php foreach ($properties as $property): ?>
                <div class="property">
                    <img src="img/<?= urlencode($property['image']) ?>" alt="Property Image" onerror="this.style.display='none';">
                    <div class="property-details">
                        <p><strong>Address:</strong> <?= htmlspecialchars($property['address']) ?></p>
                        <p><strong>Age:</strong> <?= htmlspecialchars($property['age']) ?> years</p>
                        <p><strong>Bedrooms:</strong> <?= htmlspecialchars($property['bed']) ?></p>
                        <p><strong>Ad:</strong> <?= htmlspecialchars($property['ad']) ?></p>
                        <p><strong>Garden:</strong> <?= htmlspecialchars($property['garden']) ?></p>
                        <p><strong>Price:</strong> $<?= htmlspecialchars($property['pa']) ?></p>
                        <p><strong>Tax:</strong> $<?= htmlspecialchars($property['tax']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No properties available at the moment.</p>
        <?php endif; ?>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>© 2024 Buyer Dashboard</p>
    </footer>
</body>
</html>
