<?php
$userrole = [1,2,3,4];
include("./php-scripts/security.php");

// Include connection and functions
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

$orderid = (int) $_GET["id"];
?>

<!-- Wijzigen -->
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Icon -->
    <div class="fadeIn first">
      <i class="fas fa-file-invoice fa-5x pt-1"></i>
      <p>Ordernummer: <b><?php echo $orderid; ?></b></p>
    </div>
    <div class="fadeIn second">
    <table class="table table-hover" width="100%">
          <thead>
            <tr>
              <th scope="col">Productnaam</th>
              <th scope="col">Aantal</th>
              <th scope="col">Prijs</th>
              <th scope="col">Totaalprijs</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $result = getSpecificInfo('pro4_orderproduct', 'orderid', $orderid);

              while ($orderdetails = mysqli_fetch_assoc($result)) {
                $prod = getSpecificInfo('pro4_products', 'productid', $orderdetails["productid"]);
                $product = mysqli_fetch_assoc($prod);
                displayOrderLine($product["pname"], $orderdetails["aantal"], $product["pprice"]);
              }
            ?>
          </tbody>
        </table>
    </div>
    <div>
      <a class="btn btn-success fadeIn fourth mb-4" href="#" >Downloaden</a>
      <a class="btn btn-danger fadeIn fourth mb-4" href="index.php?content=myaccount#bestellingen">Terug naar overzicht</a>
    </div>
  </div>
</div>