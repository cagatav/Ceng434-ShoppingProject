<?php

require_once('php/MySQL.php');

$database = new MySQL();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];
    
    $product = $database->getProductById($product_id);
    
    if(!$product) {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Invalid product ID.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_seller = $_POST['product_seller'];
    $product_type = $_POST['product_type'];
    
    $database->updateProduct($product_id, $product_name, $product_description, $product_price, $product_seller, $product_type);
    
    header("Location: AdminShop.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2 class="text-center mb-4">Edit Product</h2>
    <form method="post">
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>">
        </div>
        <div class="form-group">
            <label for="product_description">Product Description:</label>
            <textarea class="form-control" id="product_description" name="product_description"><?php echo $product['product_description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="product_price">Product Price:</label>
            <input type="number" class="form-control" id="product_price" name="product_price" value="<?php echo $product['product_price']; ?>">
        </div>
        <div class="form-group">
            <label for="product_seller">Product Seller:</label>
            <input type="text" class="form-control" id="product_seller" name="product_seller" value="<?php echo $product['product_seller']; ?>">
        </div>
        <div class="form-group">
            <label for="product_type">Product Type:</label>
            <input type="text" class="form-control" id="product_type" name="product_type" value="<?php echo $product['product_type']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
</body>
</html>
