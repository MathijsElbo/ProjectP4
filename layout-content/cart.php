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

    <!-- Cartlijst -->
    <div class="container">
      <?php
        if (isset($_SESSION['cart'])) {
          $cartArr = json_decode($_SESSION['cart'], true);
        } else {
          $cartArr = [];
        }

        // var_dump(array_values($cartArr));

        foreach ($cartArr as $id => $quantity) {
          $result = getSpecificInfo($id);
          
          $cartInfo = mysqli_fetch_assoc($result);

          cartProduct($quantity, $id, $cartInfo["pname"], $cartInfo["pprice"]);
        }


      ?>
    </div>

  </div>
</div>