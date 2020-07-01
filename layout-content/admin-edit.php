<?php
$userrole = [2,3,4];
include("./php-scripts/security.php");

// Include connection and functions
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

$productid = (int) $_GET["productid"];

if (isset($productid)) {
  editProduct($productid);
} else {
  header('Location: ./index.php?content=adminpanel');
}
?>