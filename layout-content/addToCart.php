<?php  
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

$quantity = (int) sanitize($_POST["quantity"]);
$productid = sanitize($_POST["productid"]);

// Check if cart exists. If it exists, json_decode the cart. Else, create a new cart.
if (isset($_SESSION['cart'])) {
  $cartArr = json_decode($_SESSION['cart'], true);
} else {
  $cartArr = [];
}

// Add quantity to products
if (isset($cartArr[$productid])) {
  $cartArr[$productid] = $cartArr[$productid] + $quantity;
} else {
  $cartArr[$productid] = $quantity;
}

// transform $cartArr into json format and put it into the $_SESSION['cart']
if (isset($cartArr)) {
  $_SESSION['cart'] = json_encode($cartArr, true);
} 
?>