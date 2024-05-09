<?php
session_start();
require_once("php/MySQL.php");
require_once("php/component.php");

$db = new MySQL("productdb", "producttable");

// Order history'ye ürünleri ekle
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cartItem) {
            $productId = $cartItem['product_id'];
            $db->addToOrderHistory($userId, $productId);
        }
    }
}

// işlem başarılı olup bu sayfaya gelirse sepeti sıfırlayacak
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head kısmı -->
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url=login.php">
    <title>Thank You</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">  
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mt-5 text-center">
                <h2>Thank You!</h2>
                <p>Your order has been placed successfully.</p>
                <p>Redirecting you to the account page...</p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
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
