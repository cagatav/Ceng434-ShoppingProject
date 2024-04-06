<?php
session_start();

require_once('php/MySQL.php');
$database = new MySQL("Productdb", "Producttable");

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $result = $database->getData("SELECT * FROM Producttable WHERE id = $product_id");

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $productName = htmlspecialchars($row['product_name']);
        $productDescription = htmlspecialchars($row['product_description']);
        $productPrice = htmlspecialchars($row['product_price']);
        $productImage = htmlspecialchars($row['product_image']);
        $productSeller = htmlspecialchars($row['product_seller']);
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Product ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .product-card {
            margin-top: 20px;
        }
        .product-card .card-img-top {
            height: 300px; /* Adjust as needed */
            object-fit: cover;
        }
    </style>
</head>
<body>
    <?php require_once("php/header.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card product-card">
                    <img src="<?php echo $productImage; ?>" class="card-img-top" alt="<?php echo $productName; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $productName; ?></h5>
                        <p class="card-text"><?php echo $productDescription; ?></p>
                        <p class="card-text">Price: $<?php echo $productPrice; ?></p>
                        <p class="card-text">Seller: <?php echo $productSeller; ?></p>
                        <form method="post" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <button type="submit" class="btn btn-primary" name="add_to_cart">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
