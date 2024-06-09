<?php
session_start();

require_once("php/MySQL.php");
require_once("php/component.php");
$db = new MySQL("Productdb", "Producttable");

if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if (in_array($_POST['product_id'], $item_array_id)) {
            print_r('Product is already added in the cart!');
        } else {
            $product_id = $_POST['product_id'];
            $cart_item = array('product_id' => $product_id, 'quantity' => 1);
            array_push($_SESSION['cart'], $cart_item);
        }
    } else {
        $product_id = $_POST['product_id'];
        $cart_item = array('product_id' => $product_id, 'quantity' => 1);
        $_SESSION['cart'] = array($cart_item);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
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
                            $product_quantity = array_column($_SESSION['cart'], 'quantity', 'product_id')[$row['product_id']];
                            cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['product_id'], $row['product_seller'], $product_quantity);
                            $total += (int)$row['product_price'] * $product_quantity;
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
                <h6 class="pt-2">PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <h6>Total (<span id="item-count">0</span> items)</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<span id="total-price">0.00</span></h6>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="payment.php" id="checkout-btn" class="btn btn-info btn-block mb-3">Continue to Checkout</a>
                <?php else: ?>
                    <a href="login.php" id="login-btn" class="btn btn-primary btn-block mb-3">Login to Proceed</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function updateQuantity(action, productId, productPrice) {
        var quantityInput = document.getElementById('quantity-' + productId);
        var currentQuantity = parseInt(quantityInput.value);

        if (action === 'plus') {
            currentQuantity += 1;
        } else if (action === 'minus' && currentQuantity > 1) {
            currentQuantity -= 1;
        }

        quantityInput.value = currentQuantity;

        var productForm = document.getElementById('cart-form-' + productId);
        var priceElement = productForm.querySelector('.product-price');
        var newPrice = productPrice * currentQuantity;
        priceElement.textContent = '$' + newPrice.toFixed(2);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("product_id=" + productId + "&quantity=" + currentQuantity);

        updatePriceDetails();
    }

    function updatePriceDetails() {
        var total = 0;
        var itemCount = 0;
        var priceElements = document.querySelectorAll('.product-price');
        var quantityInputs = document.querySelectorAll('.form-control.w-25.d-inline');
        var checkboxes = document.querySelectorAll('input[type=checkbox]');

        priceElements.forEach(function(element, index) {
            if (checkboxes[index].checked) {
                var price = parseFloat(element.textContent.replace('$', ''));
                total += price;
                itemCount += parseInt(quantityInputs[index].value);
            }
        });

        document.getElementById('total-price').textContent = total.toFixed(2);
        document.getElementById('item-count').textContent = itemCount;

        var checkoutBtn = document.getElementById('checkout-btn');
        if (itemCount === 0) {
            checkoutBtn.classList.add('disabled');
            checkoutBtn.setAttribute('aria-disabled', 'true');
            checkoutBtn.style.pointerEvents = 'none';
        } else {
            checkoutBtn.classList.remove('disabled');
            checkoutBtn.removeAttribute('aria-disabled');
            checkoutBtn.style.pointerEvents = 'auto';
        }
    }

    window.onload = function() {
        var checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', updatePriceDetails);
        });

        var quantityInputs = document.querySelectorAll('.form-control.w-25.d-inline');
        quantityInputs.forEach(function(input) {
            input.addEventListener('change', updatePriceDetails);
        });

        updatePriceDetails();
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        updatePriceDetails();
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
