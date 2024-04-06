<?php
session_start();

require_once ('php/MySQL.php');
require_once ('./php/component.php');

$database = new MySQL("Productdb", "Producttable");

function displayProducts($database) {
    $result = $database->getData();
    while ($row = mysqli_fetch_assoc($result)){
        component($row['product_name'], $row['product_description'], $row['product_price'], $row['product_image'], $row['id'], $row['product_seller']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENG 434 - Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once ("php/header.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h4>Filters</h4>
                <div class="form-group">
                    <label for="productType">Product Type</label>
                    <select class="form-control" id="productType">
                        <option>All</option>
                        <option>Phone</option>
                        <option>Laptop</option>
                        <option>Watch</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <select class="form-control" id="brand">
                        <option>All</option>
                        <option>Apple</option>
                        <option>Samsung</option>
                        <option>HP</option>
                    </select>
                </div>
            </div>
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Products</h4>
                    <div>
                        <label for="sort">Sort by:</label>
                        <select class="form-control" id="sort">
                            <option value="default">Default</option>
                            <option value="lowToHigh">Price Low to High</option>
                            <option value="highToLow">Price High to Low</option>
                        </select>
                    </div>
                </div>
                <div class="row" id="productList">
                    <?php displayProducts($database); ?>
                </div>
            </div>

        </div>
    </div>
*
