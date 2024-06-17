<?php
// Database connection details (modify as per your database setup)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve products from database
$sql = "SELECT id, name, description, price FROM products";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        .product { border-bottom: 1px solid #ccc; padding: 10px; }
        .product h2 { margin-top: 0; }
        .product p { margin-bottom: 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Products</h2>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="product">
                    <h2><?php echo $row["name"]; ?></h2>
                    <p><?php echo $row["description"]; ?></p>
                    <p><strong>Price: $<?php echo number_format($row["price"], 2); ?></strong></p>
                    <a href="view_product.php?id=<?php echo $row["id"]; ?>">View details</a>
                </div>
                <?php
            }
        } else {
            echo "No products found.";
        }
        ?>
    </div>
</body>
</html>
