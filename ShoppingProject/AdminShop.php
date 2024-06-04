<?php

require_once('php/MySQL.php');


$database = new MySQL();


$products = $database->getData();

if (isset($_POST['logout'])) {

    session_destroy();

    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .navbar-brand {
            font-size: 24px;
        }
        .container {
            max-width: 1000px;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-table th, .product-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .product-table th {
            background-color: #f2f2f2;
        }
        .description {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            white-space: normal;
            width: 350px; 
        }
        .edit-button {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
        .edit-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="Home.php" class="navbar-brand animation">
                <img src="logo/shopingtime.png" class="ml-3" width="300">
            </a>              
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="AdminPanel.php">Admin Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AdminShop.php">Admin Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AdminOrders.php">Orders</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST">
                            <button class="btn btn-link nav-link" type="submit" name="logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
    <h2 class="text-center mb-4 mt-5">Admin Shop</h2>

    <table class="product-table">
        <thead>
        <tr>
            <th style="width: 150px;">Product Image</th>
            <th style="width: 150px;">Product Name</th>
            <th style="width: 650px;">Description</th>
            <th style="width: 150px;">Price</th>
            <th style="width: 150px;">Seller</th>
            <th style="width: 150px;">Product Type</th>
            <th style="width: 150px;">Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($products->num_rows > 0): ?>
            <?php while ($product = $products->fetch_assoc()): ?>
                <tr>
                    <td><img src="<?php echo $product['product_image']; ?>" alt="Product Image" style="width: 100px; height: 100px;"></td>
                    <td>
                        <?php
                        $productName = $product['product_name'];
                        echo strlen($productName) > 30 ? substr($productName, 0, 30) . '...' : $productName;
                        ?>
                    </td>
                    <td style="width: 350px;">
                        <?php
                        $productDescription = $product['product_description'];
                        echo strlen($productDescription) > 100 ? substr($productDescription, 0, 100) . '...' : $productDescription;
                        ?>
                    </td>
                    <td><?php echo $product['product_price']; ?></td>
                    <td>
                        <?php
                        $productSeller = $product['product_seller'];
                        echo strlen($productSeller) > 10 ? substr($productSeller, 0, 10) . '...' : $productSeller;
                        ?>
                    </td>
                    <td>
                        <?php
                        $productType = $product['product_type'];
                        echo strlen($productType) > 10 ? substr($productType, 0, 10) . '...' : $productType;
                        ?>
                    </td>
                    <td>
                        <a href="edit_product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-primary edit-button">Edit</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No products found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
