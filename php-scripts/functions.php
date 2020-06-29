<?php
// Schoonmaken data input
function sanitize($raw_data)
{
    // search for $conn outside of the function
    global $conn;
    // Removes special characters from string
    $data = mysqli_real_escape_string($conn, $raw_data);
    // Converts special characters to HTMl entities
    $data = htmlspecialchars($data);
    // returns variable $data
    return $data;
}

// Salt
function RandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function getInfo($tablename){
  global $conn;
  $sql = "SELECT * FROM $tablename";

  $result = mysqli_query($conn, $sql);

  return $result;
}

function Product($productname, $productimage, $productdesc, $productprice, $productid) {
  $product = "
  <div class='row product'>
    <div class='col-3'>
      <img class='product-img' src='./assets/img/$productimage' alt='$productname'>
    </div>
    <div class='col-4'>
      <a href=''><span class='product-name'>$productname</span></a>
      <p class='mb-0'>$productdesc</p>
    </div>
    <div class='col-4'>
      <span class='product-price'>€ $productprice</span>
      <form action='index.php?content=addToCart' method='post'>
        <input type='hidden' value='$productid' name='productid'>
        <button type='submit' title='Add to cart' class='btn btn-info'>+</button>
      </form>
    </div>
  </div>";

  echo $product;
}
?>