<?php
session_start();
?>

<header id="header" class="fixed-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a href="Home.php" class="navbar-brand animation">
            <img src="logo/shopingtime.png" class="ml-3" width="300" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul class="navbar-nav mr-auto">
                    <?php if (isset($_SESSION['user_email']) && $_SESSION['user_email'] == 'admin@gmail.com'): ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark bg-light rounded-pill px-3" href="AdminPanel.php">Admin Panel</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Account.php">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="About.php">About Us</a>
                    </li>
                </ul>
                <a href="cart.php" class="nav-item nav-link">
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
            </div>
        </div>
    </nav>
</header>

<div id="toastContainer"></div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRp8Yb+/h6q4jA2ZTj6/3h6n6B1T4k8MR1spfsThf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha384-IhTC6+CnKp/wK2RR21iCKuJx1dCnKrAKFozSTaNstzL/4e9akJzvcTXlqDXnJvVj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIyAef5Pbxp/T+kPLJAKeC1zjzvQzvFI0bwKdj9" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
</html>
