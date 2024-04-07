<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once("php/MySQL.php");

    // Retrieve form data
    $country = $_POST["country"];
    $city = $_POST["city"];
    $postalCode = $_POST["postalCode"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $paymentMethod = $_POST["paymentMethod"];

    // Additional data you may want to retrieve from the session or elsewhere
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    // $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    // Here you would insert the data into your database
    // Example: Inserting into a hypothetical 'orders' table
    // $db = new MySQL("YourDatabaseName", "YourOrdersTableName");
    // $db->insertOrder($userId, $country, $city, $postalCode, $address, $phone, $paymentMethod, $cartItems);
    
    // Redirect to a thank you page or any other appropriate page
    header("Location: thank_you.php");
    exit();
} else {
    // If the form is not submitted, redirect back to the payment page
    header("Location: payment.php");
    exit();
}
?>
