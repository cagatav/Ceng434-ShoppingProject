<?php
session_start();

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

        // Create new session variable
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
    <script src="https://app.livechatai.com/embed.js" data-id="cluk9o3tp0001v667bvnwghdb" async defer></script>
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
