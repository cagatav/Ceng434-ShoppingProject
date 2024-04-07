<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Include necessary files
require_once('php/MySQL.php');
require_once('./php/component.php');

$database = new MySQL("Productdb", "Producttable");

function displayProducts($database) {
    $result = $database->getData();
    while ($row = mysqli_fetch_assoc($result)){
        // Wrap each product with anchor tag linking to product.php with product_id parameter
        echo "<div class='col-md-4 mb-3'>";
        echo "<a href='ProductDetails.php?product_id={$row['product_id']}'>";
        componentShop($row['product_name'], $row['product_description'], $row['product_price'], $row['product_image'], $row['product_id'], $row['product_seller']);
        echo "</a>";
        echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once("php/header.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-dark">Account Details</h3>
                <p><b>Name:</b> <?php echo $_SESSION['user_name']; ?></p>
                <p><b>Email:</b> <?php echo $_SESSION['user_email']; ?></p>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
            <div class="col-md-6">
                <h3 class="text-dark">Order History</h3>
                <!-- Display order history here -->
            </div>
        </div>
    </div>
</body>
</html>
