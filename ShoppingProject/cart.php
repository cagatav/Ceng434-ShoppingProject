<?php
session_start();

require_once("php/MySQL.php");
require_once("php/component.php");

$db = new MySQL("Productdb", "Producttable");

if (isset($_POST['add'])) {
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if(in_array($_POST['product_id'], $item_array_id)){
            print_r('Product is already added in the cart!');
        }
    }
    
        $product_id = $_POST['product_id'];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $cart_item = array('product_id' => $product_id);
        array_push($_SESSION['cart'], $cart_item);  
    if (!in_array($product_id, array_column($_SESSION['cart'], 'product_id'))) {
        $cart_item = array('product_id' => $product_id);
        array_push($_SESSION['cart'], $cart_item);
    }
}

if (isset($_POST['remove']) && $_GET['action'] == 'remove' && isset($_GET['product_id'])) {
    $productid = $_GET['product_id'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item["product_id"] == $productid) {
                unset($_SESSION['cart'][$key]);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php require_once('php/header.php'); ?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h3 class="text-dark">My Cart</h3>
                <hr>
                <?php
                $total = 0;
                if (!empty($_SESSION['cart'])) {
                    $productids = array_column($_SESSION['cart'], 'product_id');
                    $result = $db->getData();
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (in_array($row['product_id'], $productids)) {
                            cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['product_id'], $row['product_seller']);
                            $total += (int)$row['product_price'];
                        }
                    }
                } else {
                    echo "<h5>Cart is Empty</h5>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if (!empty($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<h6>Price ($count items)</h6>";
                        } else {
                            echo "<h6>Price (0 items)</h6>";
                        }
                        ?>
                        <hr>
                        <h6>Total Amount</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <hr>
                        <h6>$<?php echo $total; ?></h6>
                    </div>
                </div>
            </div>
            <!-- Continue to Checkout Button -->
            <div class="mt-3">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="payment.php" class="btn btn-info btn-block">Continue to Checkout</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-primary btn-block">Login to Proceed</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
