<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>
<?php
function componentShop($productName, $productDescription, $productPrice, $productImage, $productid, $productSeller) {
    $element = "
    <div class='card'>
        <img src='$productImage' class='card-img-top' alt='$productName'>
        <div class='card-body'>
            <p class= 'text-dark'>$productSeller</p>
            <h6 class='card-title text-info'>$productName</h6>
            <h8 class= 'text-dark'>$ $productPrice <br><br></h8>
            <button class='btn btn-info' name='add'>View Detail</button>
            <input type='hidden' name='product_id' value='$productid'>
        </div>
    </div>
    ";
    echo $element;
}

function componentHome($productName, $productDescription, $productPrice, $productImage, $productid, $productSeller) {
    $element = "
    <div class='col-md-3 my-2'>
        <div class='card'>
            <img src='$productImage' class='card-img-top' alt='$productName'>
            <div class='card-body'>
                <h6 class='card-title'>$productName</h6>
                <h6>$ $productPrice</h6>
                <form action='Home.php' method='post'>
                    <button class='btn btn-info' name='add'><img src='logo/addtocart.png' alt='Add to Cart'></button>
                    <input type='hidden' name='product_id' value='$productid'>
                </form>
            </div>
        </div>
    </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid, $productseller){
    $element = "
    <form id=\"cart-form-$productid\" action=\"cart.php?action=remove&product_id=$productid\" method=\"post\" class=\"cart-items\">
        <div class=\"border rounded\">
            <div class=\"row bg-white\">
                <div class=\"col-md-1 pl-0\">
                    <input type=\"checkbox\" class=\"custom-checkbox\" name=\"selected_products[]\" value=\"$productid\">
                </div>
                <div class=\"col-md-2\">
                    <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid\">
                </div>
                <div class=\"col-md-5\">
                    <h5 class=\"pt-2\">$productname</h5>
                    <small class=\"pt-2\"><b> Seller: </b>$productseller</small>
                    <h5 class=\"pt-2 product-price\">$$productprice</h5>
                    <button type=\"submit\" class=\"btn btn-danger mx-2 remove-btn\" name=\"remove\">Remove</button>
                </div>
                <div class=\"col-md-4 py-5\">
                    <div>
                        <button type=\"button\" class=\"btn bg-light border rounded-circle\" onclick=\"updateQuantity('minus', $productid, $productprice)\"><i class=\"fas fa-minus\"></i></button>
                        <input type=\"text\" id=\"quantity-$productid\" value=\"1\" class=\"form-control w-25 d-inline text-center\" readonly>
                        <button type=\"button\" class=\"btn bg-light border rounded-circle\" onclick=\"updateQuantity('plus', $productid, $productprice)\"><i class=\"fas fa-plus\"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    ";
    echo $element;
}

?>

















