<?php
// Include connection and functions
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

if (isset($_SESSION["cart"])) {
  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $orderid = addOrder($id);

    if (isset($_SESSION['cart'])) {
      $cartArr = json_decode($_SESSION['cart'], true);
    } else {
      $cartArr = [];
    }

    foreach ($cartArr as $productid => $quantity) {
      addOrderLine($orderid, $quantity, $productid);
      
    }

    unset($_SESSION['cart']);


  } else {
    echo "niet ingelogd";
  }
} else {
  echo "geen cart";
}

?>