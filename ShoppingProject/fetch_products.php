<?php
session_start();

require_once('php/MySQL.php');
require_once('./php/component.php');

$database = new MySQL("Productdb", "Producttable");

function fetchProducts($database, $filter, $sort) {
    // Prepare the SQL query based on filter and sort options
    $sql = "SELECT * FROM Producttable WHERE 1=1";
    
    // Apply filter conditions
    if ($filter['productType'] != 'All') {
        $sql .= " AND product_type = '{$filter['productType']}'";
    }
    if ($filter['product_seller'] != 'All') {
        $sql .= " AND product_seller = '{$filter['product_seller']}'";
    }
    
    // Apply sorting
    switch ($sort) {
        case 'lowToHigh':
            $sql .= " ORDER BY product_price ASC";
            break;
        case 'highToLow':
            $sql .= " ORDER BY product_price DESC";
            break;
        // Add more sorting options as needed
    }
    
    // Execute the query
    $result = $database->getData($sql);
    
    ob_start(); // Start output buffering
    while ($row = mysqli_fetch_assoc($result)){
        echo "<div class='col-md-4 mb-3'>";
        echo "<a href='ProductDetails.php?product_id={$row['product_id']}'>";
        componentShop($row['product_name'], $row['product_description'], $row['product_price'], $row['product_image'], $row['product_id'], $row['product_seller']);
        echo "</a>";
        echo "</div>";
    }
    return ob_get_clean(); // Return the buffered output
}

// Retrieve filter and sort parameters from the AJAX request
$filter = array(
    'productType' => $_POST['filter']['productType'],
    'product_seller' => $_POST['filter']['product_seller']
);
$sort = $_POST['sort'];

// Fetch and display products based on filter and sort options
echo fetchProducts($database, $filter, $sort);
?>
