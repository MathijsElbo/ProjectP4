<?php
// Include connection and functions
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

if (isset($_SESSION["cart"])) {
  if (isset($_SESSION["id"])) {
    // Creates order
    $orderid = addOrder($_SESSION["id"]);

    // Gets cart info
    $cartArr = checkCart($_SESSION["cart"]);

    // Adds orderlines for each product
    foreach ($cartArr as $productid => $quantity) {
      addOrderLine($orderid, $quantity, $productid);
    }

    // Deletes cart
    unset($_SESSION['cart']);
    if (!isset($_SESSION['cart'])) {
      echo '<div class="alert alert-success" role="alert">Uw bestelling is geplaatst.</div>';
      header("Refresh: 4; url=./index.php?content=myaccount#bestellingen");
    }

  } else {
    $_SESSION["login"] = "shop";
    header("Location: index.php?content=inloggen");
  }
} else {
  echo "geen cart";
}

?>