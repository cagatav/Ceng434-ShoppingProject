<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


require_once('php/MySQL.php');
require_once('./php/component.php');

$db = new MySQL("Productdb", "Producttable");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once("php/header.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-dark">Account Details</h3>
                <p><b>Name:</b> <?php echo $_SESSION['user_name']; ?></p>
                <p><b>Email:</b> <?php echo $_SESSION['user_email']; ?></p>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
            <div class="col-md-6">
                <h3 class="text-dark">Order History</h3>
                <div class="list-group">
                <?php  
                    if (isset($_SESSION['user_id'])) {
                        $userId = $_SESSION['user_id'];
                        $result = $db->getOrderHistory($userId);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $productId = $row['product_id'];
                                $product = $db->executeQuery("SELECT * FROM Producttable WHERE product_id = $productId")->fetch_assoc();
                    ?>
                                <a href="productdetails.php?product_id=<?php echo $product['product_id']; ?>" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $product['product_name']; ?></h5>
                                        <small><?php echo $row['order_date']; ?></small>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?php echo $product['product_image']; ?>" class="img-fluid" alt="Product Image">
                                        </div>
                                        <div class="col-md-9">
                                            <p class="mb-1">Price: <?php echo $product['product_price']; ?></p>
                                            <p class="mb-1">Order Number: <?php echo $row['order_id']; ?></p>
                                        </div>
                                    </div>
                                </a>
                    <?php
                            }
                        } else {
                            echo "<p>No orders found.</p>";
                        }
                    } else {
                        echo "<p>Please login to view order history.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
