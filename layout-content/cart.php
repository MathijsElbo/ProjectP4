<?php
// Include connection and functions
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");
?>

<div class="container-fluid">
  <div class="container">
    <div class="row">
    <!-- Header tekst -->
      <div class="col-12 col-md-10">
        <h5>Mijn winkelmandje</h5>
      </div>
      <div class="col-12 col-md-2">
        <a class="btn btn-order" href="index.php?content=orderCheck">Ik ga bestellen</a>
      </div>
    </div>

    <!-- Cartlist -->
      <?php
      if (isset($_SESSION["cart"])) {
        $cartArr = checkCart($_SESSION["cart"]);

        foreach ($cartArr as $id => $quantity) {
          $result = getSpecificInfo('pro4_products','productid',$id);
          $cartInfo = mysqli_fetch_assoc($result);
          cartProduct($quantity, $id, $cartInfo["pname"], $cartInfo["pprice"]);
        }
      } else {
        echo "Uw winkelmandje is leeg.";
      }

      ?>

  </div>
</div>