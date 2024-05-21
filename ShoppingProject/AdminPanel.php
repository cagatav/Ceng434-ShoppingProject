<?php
// Oturumu başlat
session_start();

// MySQL.php dosyasını dahil edin
require_once('php/MySQL.php');

// Veritabanı bağlantısını oluşturun
$database = new MySQL();

// Çıkış işlemi
if (isset($_POST['logout'])) {
    // Oturumu sonlandır
    session_destroy();
    // Kullanıcıyı login sayfasına yönlendir
    header("Location: login.php");
    exit;
}

// Ürün ekleme formu gönderildiğinde
if (isset($_POST['add_product'])) {
    // Form verilerini alın
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name']; // Dosya adını al
    $product_image_tmp = $_FILES['product_image']['tmp_name']; // Geçici dosya yolunu al
    move_uploaded_file($product_image_tmp, "upload/$product_image"); // Dosyayı belirtilen klasöre taşı
    $product_seller = $_POST['product_seller'];
    $product_type = $_POST['product_type'];

    // Ürünü veritabanına ekleyin
    $success = $database->addToProductTable($product_name, $product_description, $product_price, $product_image, $product_seller, $product_type);
    if ($success) {
        $success_message = "Product added successfully!";
    } else {
        $error_message = "Failed to add product.";
    }
}

// Ürün silme isteği gönderildiğinde
if (isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];

    // Ürünü veritabanından sil
    $success = $database->deleteProduct($product_id);
    if ($success) {
        $success_message = "Product deleted successfully!";
    } else {
        $error_message = "Failed to delete product.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .navbar-brand {
            font-size: 24px;
        }
        .container {
            max-width: 1000px;
        }
        .product-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .product-card img {
            width: 100%;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .product-card .card-body {
            padding: 15px;
        }
        .product-card .card-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .product-card .card-text {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
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

    <!-- Admin Panel Content -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Admin Panel</h2>

        <?php if(isset($success_message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if(isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <h4>Add Product</h4>
        <form method="POST" action="AdminPanel.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="product_description">Product Description:</label>
                <textarea class="form-control" id="product_description" name="product_description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price:</label>
                <input type="number" class="form-control" id="product_price" name="product_price" required>
            </div>
            <div class="form-group">
                <label for="product_image">Product Image:</label>
                <input type="file" class="form-control" id="product_image" name="product_image" required>
            </div>
            <div class="form-group">
                <label for="product_seller">Product Seller:</label>
                <input type="text" class="form-control" id="product_seller" name="product_seller" required>
            </div>
            <div class="form-group">
                <label for="product_type">Product Type:</label>
                <input type="text" class="form-control" id="product_type" name="product_type" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-T/B5HSZczm9XVRwO8Fqx3bSjXALN0vO2PvzFcGU6scqKdAHR8HyjR1pxsgp/qlR" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-Ms/ET6joNDQ9tuHF2m49D/xm6j5SkE/Iw+nBhRZjGXdiXoPkOS+1FszdL4/8x0z+o" crossorigin="anonymous"></script>
</body>
</html>
