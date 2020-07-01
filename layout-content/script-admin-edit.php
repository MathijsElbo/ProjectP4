<?php
$userrole = [2,3,4];
include("./php-scripts/security.php");
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

if (isset($_POST)) {
  $id = sanitize($_POST["productid"]);
  $name = sanitize($_POST["productname"]);
  $image = sanitize($_POST["productimage"]);
  $price = sanitize($_POST["productprice"]);
  $btw = sanitize($_POST["productbtw"]);
  $desc = sanitize($_POST["productdesc"]);

  if (!empty($id)) {
    if (!empty($name)) {
      if (!empty($image)) {
        if (!empty($price)) {
          if (!empty($btw)) {
            if (!empty($desc)) {
              // Update product als alle velden zijn ingevuld.
              $result = updateProduct($id, $name, $image, $price, $btw, $desc);

              if ($result) {
                echo '<div class="alert alert-success" role="alert">Product is gewijzigd.</div>';
                header("Refresh: 4; url=./index.php?content=adminpanel#assortiment");
              } else {
                echo '<div class="alert alert-danger" role="alert">Er is iets misgegaan. Het product is niet geupdate.</div>';
                header("Refresh: 4; url=./index.php?content=adminpanel");
              }

            } else {
              echo '<div class="alert alert-danger" role="alert">Er is geen product omschrijving ingevoerd.</div>';
              header("Refresh: 4; url=./index.php?content=adminpanel");
            }
          } else {
            echo '<div class="alert alert-danger" role="alert">Er is geen product BTW percentage ingevoerd.</div>';
            header("Refresh: 4; url=./index.php?content=adminpanel");
          }
        } else {
          echo '<div class="alert alert-danger" role="alert">Er is geen product prijs ingevoerd.</div>';
          header("Refresh: 4; url=./index.php?content=adminpanel");
        }
      } else {
        echo '<div class="alert alert-danger" role="alert">Er is geen product image ingevoerd.</div>';
        header("Refresh: 4; url=./index.php?content=adminpanel");
      }
    } else {
      echo '<div class="alert alert-danger" role="alert">Er is geen product naam ingevoerd.</div>';
      header("Refresh: 4; url=./index.php?content=adminpanel");
    }
  } else {
    echo '<div class="alert alert-danger" role="alert">Er is geen product ID om te wijzigen.</div>';
    header("Refresh: 4; url=./index.php?content=adminpanel");
  }
} else {
  header("Location: index.php?content=adminpanel");
}

?>