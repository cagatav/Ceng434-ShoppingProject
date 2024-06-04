<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once("php/MySQL.php");


    $country = $_POST["country"];
    $city = $_POST["city"];
    $postalCode = $_POST["postalCode"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $paymentMethod = $_POST["paymentMethod"];


    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    // $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    // $db = new MySQL("YourDatabaseName", "YourOrdersTableName");
    // $db->insertOrder($userId, $country, $city, $postalCode, $address, $phone, $paymentMethod, $cartItems);
    

    header("Location: thank_you.php");
    exit();
} else {

    header("Location: payment.php");
    exit();
}
?>
