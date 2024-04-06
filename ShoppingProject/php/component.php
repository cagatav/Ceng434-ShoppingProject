<?php

function componentShop($productName, $productDescription, $productPrice, $productImage, $productid, $productSeller) {
    $element = "
    <div class='card'>
        <img src='$productImage' class='card-img-top' alt='$productName'>
        <div class='card-body'>
            <h5 class='card-title'>$productName</h5>
            <h6>$ $productPrice</h6>
            <button class='btn btn-primary' name='add'>Add to Cart</button>
            <input type='hidden' name='product_id' value='$productid'>
        </div>
    </div>
    ";
    echo $element;
}

function componentHome($productName, $productDescription, $productPrice, $productImage, $productid, $productSeller) {
    $element = "
    <div class='col-md-4 my-2'>
        <div class='card'>
            <img src='$productImage' class='card-img-top' alt='$productName'>
            <div class='card-body'>
                <h5 class='card-title'>$productName</h5>
                <h6>$ $productPrice</h6>
                <form action='Home.php' method='post'>
                    <button class='btn btn-primary' name='add'>Add to Cart</button>
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
    <form action=\"cart.php?action=remove&product_id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"pt-2\"><b> Seller: </b>$productseller</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    ";
    echo  $element;
}

















