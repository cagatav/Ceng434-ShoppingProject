<?php
// MySQL.php dosyasını dahil edin
require_once('php/MySQL.php');

// Veritabanı bağlantısını oluşturun
$database = new MySQL();

// Siparişleri veritabanından alın
$orders = $database->getOrders();

if (isset($_POST['logout'])) {
    // Oturumu sonlandır
    session_destroy();
    // Kullanıcıyı login sayfasına yönlendir
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* Navbar CSS */
        .navbar-brand {
            font-size: 24px;
        }
        .container {
            max-width: 1000px;
        }
        .order-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
        }
        .order-card h5 {
            margin-bottom: 10px;
        }
        .order-card p {
            margin-bottom: 5px;
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
        <h2 class="text-center mb-4 mt-5">Orders</h2>

        <?php if ($orders->num_rows > 0): ?>
            <?php while ($order = $orders->fetch_assoc()): ?>
                <div class="order-card">
                    <h5>Order ID: <?php echo $order['order_id']; ?></h5>
                    <p>User ID: <?php echo $order['user_id']; ?></p>
                    <p>Product ID: <?php echo $order['product_id']; ?></p>
                    <p>Order Date: <?php echo $order['order_date']; ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
