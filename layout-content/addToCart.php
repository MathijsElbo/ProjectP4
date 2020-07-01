<?php  
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

if (!empty($_POST)) {
  $quantity = (int) 1;
  $productid = sanitize($_POST["productid"]);

  if (isset($quantity) && isset($productid)) {

    // Check if cart exists, otherwise create a cart
    $cartArr = checkCart($_SESSION["cart"]);

    //$cartArr = addToCart($cartArr, $productid, $quantity);
    if (isset($cartArr[$productid])) {
      $cartArr[$productid] = $cartArr[$productid] + $quantity;
    } else {
      $cartArr[$productid] = $quantity;
    }

    // Json_encode the $cartArr
    $_SESSION["cart"] = encodeCart($cartArr);

    if (isset($_SESSION["cart"])) {
      echo '<div class="alert alert-success" role="alert">Uw product is succesvol toegevoegd aan uw winkelwagentje!</div>';
      header("Refresh: 2; url=./index.php?content=webshop");
    } else {
      echo '<div class="alert alert-danger" role="alert">Het is niet gelukt uw product toe te voegen. Probeert u opnieuw.</div>';
      header("Refresh: 4; url=./index.php?content=webshop");
    }

  } else {
    echo '<div class="alert alert-danger" role="alert">Er is geen product geselecteerd. U word teruggestuurd naar de webshop.</div>';
    header("Refresh: 4; url=./index.php?content=webshop");
  }

} else {
  echo '<div class="alert alert-danger" role="alert">Er is iets misgegaan. U word terugverwezen naar de homepagina.</div>';
  header("Refresh: 4; url=./index.php?content=homepage");
}
?>