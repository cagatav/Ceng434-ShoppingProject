<?php
session_start();

require_once ('php/MySQL.php');
require_once ('./php/component.php');
$database = new MySQL("Productdb", "Producttable");

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if(in_array($_POST['product_id'], $item_array_id)){
            $_SESSION['toast_message'] = 'Product is already added in the cart!';
        }else{
            $_SESSION['toast_message'] = 'Product is added in the cart!';
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    }
    else{
        $_SESSION['toast_message'] = 'Product is added in the cart!';
        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        $_SESSION['cart'][0] = $item_array;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CENG 434 - Welcome to Our E-Commerce Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script
        src="https://app.livechatai.com/embed.js"
        data-id="cluk9o3tp0001v667bvnwghdb"
        async defer>
    </script>
    <style>
        #toastContainer {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php require_once ("php/header.php");?>
<div class="container">
    <div class="row text-center py-4">
        <div class="col">
            <h1 class= "text-dark hover-animation">Welcome to <b>Shopping Time!</b></h1>
            <p>Do you know what time it is? It's <b>Shopping Time!</b></p>
        </div>
    </div>
    <div id="kayarbanner" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#kayarbanner" data-slide-to="0" class="active"></li>
            <li data-target="#kayarbanner" data-slide-to="1"></li>
            <li data-target="#kayarbanner" data-slide-to="2"></li>
            <li data-target="#kayarbanner" data-slide-to="3"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="upload/banner-welcome.png" class="d-block mx-auto" style="width: auto; height: 550px;" alt="banner1">
            </div>
            <div class="carousel-item">
                <img src="upload/banner-shopnow.png" class="d-block mx-auto" style="width: auto; height: 550px;" alt="banner2">
            </div>
            <div class="carousel-item">
                <img src="upload/banner-livechatai.png" class="d-block mx-auto" style="width: auto; height: 550px;" alt="banner3">
            </div>
            <div class="carousel-item">
                <img src="upload/banner-team.png" class="d-block mx-auto" style="width: auto; height: 550px;" alt="banner4">
            </div>

        </div>
        <a class="carousel-control-prev" href="#kayarbanner" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#kayarbanner" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row text-center mt-5 text-info">
        <h2 class="text-dark m-auto"><b>Featured Products</b></h2>
    </div>
    <div class="row text-center py-5">
        <?php
            $result = $database->getData();
            while ($row = mysqli_fetch_assoc($result)) {
                componentHome(
                    $row['product_name'], 
                    $row['product_description'], 
                    $row['product_price'], 
                    $row['product_image'], 
                    $row['product_id'], 
                    $row['product_seller']
                );
            }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toastMessage = <?php echo json_encode($_SESSION['toast_message'] ?? ''); ?>;
    if (toastMessage) {
        var toastHTML = `
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
            <div class="toast-header">
                <strong class="mr-auto">Notification</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                ${toastMessage}
            </div>
        </div>`;
        var toastContainer = document.getElementById('toastContainer');
        toastContainer.innerHTML = toastHTML;
        $('.toast').toast('show');
        <?php unset($_SESSION['toast_message']); ?>
    }
});
</script>
</body>
</html>
