<?php
// Schoonmaken data input
function sanitize($raw_data)  {
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

// Get all from tables
function getInfo($tablename) {
  global $conn;
  $sql = "SELECT * FROM `$tablename`";

  $result = mysqli_query($conn, $sql);

  return $result;
}

// Get product information
function getSpecificInfo($tablename, $columnid, $id) {
  global $conn;
  $sql = "SELECT * FROM `$tablename` WHERE `$columnid` = '$id'";

  $result = mysqli_query($conn, $sql);

  return $result;
}

// Creates product rows
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

// Creates cart rows
function cartProduct($quantity, $id, $name, $price) {
  $totalprice = $quantity * $price;

  $product = "
  <div class='row cart'>
    <div class='col-3'>
      <span class='product-name'>Product:</span>
      <a href=''><span class='product-name'>$name</span></a>
    </div>
    <div class='col-5'>
      <span>Prijs: € $price</span><br>
      <span>Aantal: $quantity</span><br>
      <span>Totaalprijs: € $totalprice</span>
    </div>
    
  </div>";

  echo $product;
}

// Creates Order
function addOrder($id) {
  global $conn;

  $sql = "INSERT INTO `pro4_orders` (`orderid`, `orderstatusid`, `userid`) VALUES (NULL, '1', $id)";

  $result = mysqli_query($conn, $sql);

  $orderid = mysqli_insert_id($conn);

  return $orderid;
}

// Creates orderlines
function addOrderLine($orderid, $quantity, $id) {
  global $conn;

  $sql = "INSERT INTO `pro4_orderproduct` (`orderid`, `aantal`, `productid`) VALUES ($orderid, $quantity, $id)";

  $result = mysqli_query($conn, $sql);

  return $result;
}

// Displays all orders on myaccount page
function displayOrder($orderid, $orderstatusid, $userid) {
  switch ($orderstatusid) {
    case "1":
      $orderstatus = "Wordt verwerkt";
    break;
    case "2":
      $orderstatus = "Wordt ingepakt";
    break;
    case "3":
      $orderstatus = "Wordt verzonden";
    break;
    case "4":
      $orderstatus = "Bezorgd";
    break;
  }

  $string = "<tr>
  <td>$orderid</td>
  <td>$orderstatus</td>
  <td><a href=index.php?content=orderdetails&id=$orderid>Bestelling bekijken</a></td>
  </tr>";

  echo $string;
}

function displayOrderLine($product, $quantity, $price) {
  $totalprice = $price * $quantity;

  $line = "<tr>
  <td>$product</td>
  <td>$quantity</td>
  <td>€ $price</td>
  <td>€ $totalprice</td>
  </tr>";

  echo $line;
}

// Checks cart
function checkCart($cart) {
  if (isset($cart)) {
    $cartArr = json_decode($cart, true);
  } else {
    $cartArr = [];
  }

  return $cartArr;
}

function addToCart($arr, $productid, $quantity) {
  if (isset($arr[$productid])) {
    $arr[$productid] = $arr[$productid] + $quantity;
  } else {
    $arr[$productid] = $quantity;
  }

  return $arr;
}

// json_encodes session cart
function encodeCart($cartArr) {
  if (isset($cartArr)) {
    $cartArr = json_encode($cartArr, true);
  }

  return $cartArr;
}

?>