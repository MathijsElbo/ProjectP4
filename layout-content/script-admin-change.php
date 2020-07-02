<?php
$userrole = [2,3,4];
include("./php-scripts/security.php");
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

if (isset($_POST)) {
  $orderid = (int) sanitize($_POST["orderid"]);
  $orderstatus = (int) sanitize($_POST["orderstatus"]);

  if (!empty($orderid) && !empty($orderstatus)) {
    $result = updateOrderstatus($orderid, $orderstatus);

    if ($result) {
      echo '<div class="alert alert-success" role="alert">Orderstatus is succesvol bijgewerkt.</div>';
      header("Refresh: 4; url=./index.php?content=admin-order&id=$orderid");
    } else {
      echo '<div class="alert alert-danger" role="alert">Foutmelding: Orderstatus is niet gewijzigd.</div>';
      header("Refresh: 4; url=./index.php?content=admin-order&id=$orderid");
    }

  } else {
    echo '<div class="alert alert-danger" role="alert">Orderid of orderstatus is niet ingevuld.</div>';
    header("Refresh: 4; url=./index.php?content=admin-order&id=$orderid");
  }
} else {
  echo '<div class="alert alert-danger" role="alert">Volgens mij zit u hier verkeerd! U word teruggestuurd naar de homepage.</div>';
  header("Refresh: 4; url=./index.php?content=homepage");
}
?>