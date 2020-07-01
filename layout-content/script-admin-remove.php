<?php
$userrole = [2,3,4];
include("./php-scripts/security.php");

// Include connection and functions
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

if (isset($_GET["action"])) {
  $action = $_GET["action"];

  switch ($action) {
    case "order":
      $orderid = $_GET["orderid"];

      $result = removeOrder($orderid);
      echo '<div class="alert alert-success" role="alert">Order is succesvol verwijderd.</div>';
      header("Refresh: 4; url=./index.php?content=adminpanel");
    break;
    case "orderline":
      $orderid = $_GET["orderid"];
      $productid = $_GET["productid"];

      $result = removeOrderline('pro4_orderproduct', $orderid, $productid);
      echo '<div class="alert alert-success" role="alert">Orderregel is succesvol verwijderd.</div>';
      header("Refresh: 4; url=./index.php?content=admin-order&id=$orderid");
    break;
  }
} else {
  echo '<div class="alert alert-danger" role="alert">Er is iets misgegaan.</div>';
  header("Refresh: 4; url=./index.php?content=adminpanel");
}

?>