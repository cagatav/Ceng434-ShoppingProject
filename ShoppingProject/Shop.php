<?php
session_start();

require_once ('php/MySQL.php');
require_once ('./php/component.php');

$database = new MySQL("Productdb", "Producttable");

function displayProducts($database) {
    $result = $database->getData();
    while ($row = mysqli_fetch_assoc($result)){
        component($row['product_name'], $row['product_description'], $row['product_price'], $row['product_image'], $row['id'], $row['product_seller']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a href="Home.php" class="navbar-brand">
            <img src="logo/shopingtime.png" class="ml-3" width="300">
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Home.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="account.php">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link">
                        <h5 class="px-5 cart">
                            <i class="fas fa-shopping-cart"></i> Cart
                            <?php
                            if (isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                            }else{
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                            }
                            ?>
                        </h5>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h4>Filters</h4>
                <div class="form-group">
                    <label for="productType">Product Type</label>
                    <select class="form-control" id="productType">
                        <option>All</option>
                        <option>Phone</option>
                        <option>Laptop</option>
                        <option>Watch</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <select class="form-control" id="brand">
                        <option>All</option>
                        <option>Apple</option>
                        <option>Samsung</option>
                        <option>HP</option>
                    </select>
                </div>
            </div>
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Products</h4>
                    <div>
                        <label for="sort">Sort by:</label>
                        <select class="form-control" id="sort">
                            <option value="default">Default</option>
                            <option value="lowToHigh">Price Low to High</option>
                            <option value="highToLow">Price High to Low</option>
                        </select>
                    </div>
                </div>
                <div class="row" id="productList">
                    <?php displayProducts($database); ?>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src
