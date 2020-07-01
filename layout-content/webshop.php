<?php
// Include connection and functions
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");
?>

<div class="container">
  <?php 
    // Ophalen van producten
    $result = getInfo("pro4_products");

    while ($product = mysqli_fetch_assoc($result)) {
      Product($product['pname'], $product['pimage'], $product['pdesc'], $product['pprice'], $product['productid']);
    }
  ?>
</div>