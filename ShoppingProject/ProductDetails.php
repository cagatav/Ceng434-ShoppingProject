<?php
session_start();

require_once('php/MySQL.php');
$database = new MySQL("Productdb", "Producttable");

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $result = $database->getData("SELECT * FROM Producttable WHERE product_id = $product_id");

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $productName = htmlspecialchars($row['product_name']);
        $productDescription = htmlspecialchars($row['product_description']);
        $productPrice = htmlspecialchars($row['product_price']);
        $productImage = htmlspecialchars($row['product_image']);
        $productSeller = htmlspecialchars($row['product_seller']);
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Product ID not provided.";
    exit;
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .container {
            display: flex;
        }
        .details {
        width: 60%;
        order: 2;
        margin: auto;
        display: flex;
        flex-direction: column; 
        }

        .price-cart-container {
            display: flex;
            justify-content: space-between; 
            align-items: center;
        }

        .add-to-cart-button {
            width: auto; 
            margin-left: auto; 
            display: flex;
            align-items: center; 
        }

        .image {
            max-width: 80%;
            height: auto;
            margin: auto;
            order: 1; 
            align-items: center;

        }
    </style>
</head>
<body>
<?php require_once("php/header.php"); ?>
    <div class="container">
        <div class="image">
            <img src="<?php echo $productImage; ?>" alt="Ürün Resmi" style="width: 700px;">
        </div>
        <div class="details mt-5">

    <h3 class="text-dark text-center "><?php echo $productName; ?></h3>
    <p class="text-center"><?php echo $productSeller; ?></p>
    <p class="text-justify mt-3"><?php echo $productDescription; ?></p>
    <div class="price-cart-container">
        <h4 class="font-light text-dark hover-animation mt-5">$ <?php echo $productPrice; ?></h4>
        <form method="post" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <button class='btn btn-info add-to-cart-button mt-5' name='add'>
                <img src='logo/addtocart.png' alt='Add to Cart' style="width: 350px;">
            </button>
        </form>
    </div>        
</div>
</body>
</html>
