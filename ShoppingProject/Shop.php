<?php
session_start();

require_once('php/MySQL.php');
require_once('./php/component.php');

$database = new MySQL("Productdb", "Producttable");

function displayProducts($database) {
    $result = $database->getData();
    while ($row = mysqli_fetch_assoc($result)){
        echo "<div class='col-md-4 mb-3'>";
        echo "<a href='ProductDetails.php?product_id={$row['product_id']}'>";
        componentShop($row['product_name'], $row['product_description'], $row['product_price'], $row['product_image'], $row['product_id'], $row['product_seller']);
        echo "</a>";
        echo "</div>";
    }
}

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if(in_array($_POST['product_id'], $item_array_id)){
            print_r('Product is already added in the cart!');
        }else{
            print_r('Product is added in the cart!');
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    }else{
        $item_array = array(
                'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENG 434 - Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchProducts(filter, sort) {
                $.ajax({
                    url: 'fetch_products.php',
                    method: 'POST',
                    data: { filter: filter, sort: sort },
                    success: function(response) {
                        $('#productList').html(response);
                    }
                });
            }

            $('#productType, #product_seller, #sort').change(function() {
                var filter = {
                    productType: $('#productType').val(),
                    product_seller: $('#product_seller').val()
                };
                var sort = $('#sort').val();
                fetchProducts(filter, sort);
            });
        });
    </script>
    <style>
        a {
            text-decoration: none !important;
            display: inline-block; 
            transition: transform 0.3s ease; 
        }
        a:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <?php require_once("php/header.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
            <br><br><br><h4>Filters</h4><br>
                <div class="form-group">
                    <label for="productType">Product Type</label>
                    <select class="form-control" id="productType">
                        <option>All</option>
                        <option>Notebook</option>
                        <option>Monitor</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="product_seller">Brand</label>
                    <select class="form-control" id="product_seller">
                        <option>All</option>
                        <option>ASUS</option>
                        <option>GIGABYTE</option>
                        <option>Lenovo</option>
                        <option>MSI</option>
                        <option>ViewSonic</option>
                        <option>Razer</option>
                    </select>
                </div>
            </div>
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-dark">Products</h3>
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
</body>
</html>
