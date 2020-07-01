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

// Displays all orderlines on orderdetails
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

// Adds quantity to array
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

// ADMIN FUNCTIONS
// Displays all orders on myaccount page - For ADMIN
function adminDisplayOrder($orderid, $orderstatusid, $userid) {
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
  <td>$userid</td>
  <td>$orderstatus</td>
  <td><a href=index.php?content=admin-order&id=$orderid>Bestelling wijzigen</a></td>
  </tr>";

  echo $string;
}

// Displays all orders on myaccount page - For ADMIN
function adminDisplayProduct($id, $name, $image, $price, $btw, $desc) {

  $string = "<tr>
  <td>$id</td>
  <td>$name</td>
  <td>$image</td>
  <td>$price</td>
  <td>$btw</td>
  <td>$desc</td>
  <td><a href=index.php?content=admin-edit&productid=$id>Product wijzigen</a></td>
  </tr>";

  echo $string;
}

// Displays all orderlines on orderdetails
function adminDisplayOrderLine($product, $quantity, $price, $orderid, $productid) {
  $totalprice = $price * $quantity;

  $line = "<tr>
  <td>$product</td>
  <td>$quantity</td>
  <td>€ $price</td>
  <td>€ $totalprice</td>
  <td><a href='index.php?content=script-admin-remove&action=orderline&orderid=$orderid&productid=$productid'><i class='fas fa-trash-alt'></i></a></td>
  </tr>";

  echo $line;
}

// Removes an orderline from order
function removeOrderline($table, $orderid, $productid) {
  global $conn;

  $sql = "DELETE FROM `$table` WHERE `orderid` = '$orderid' AND `productid` = '$productid';";
  $result = mysqli_query($conn, $sql);

  return $result;
}

// Removes order and all the orderlines
function removeOrder($orderid) {
  global $conn;

  $orderline = "DELETE FROM `pro4_orderproduct` WHERE `orderid` = '$orderid';";
  $result = mysqli_query($conn, $orderline);

  $order = "DELETE FROM `pro4_orders` WHERE `orderid` = '$orderid';";
  $result = mysqli_query($conn, $order);

  return $result;
}

// Creates editing form for admins to edit product
function editProduct($id) {
  global $conn;

  $result = getSpecificInfo('pro4_products', 'productid', $id);
  $p = mysqli_fetch_assoc($result);

  $string = " <div class='wrapper fadeInDown'>
                <div id='formContent'>
                  <div class='fadeIn first'>
                    <i class='fas fa-poll-h fa-5x'></i>
                    <p>Product aanpassen: </p>
                  </div>
  
                <form action='index.php?content=script-admin-edit' method='post' class='vlr'>
                  <span class='fadeIn second'>Productid</span>
                  <input class='fadeIn second' type='text' name='productid' value='". $p["productid"] ."' placeholder='ProductID' readonly>
                  <span class='fadeIn second'>Productnaam</span>
                  <input class='fadeIn second' type='text' name='productname' value='". $p["pname"] ."' placeholder='Productnaam'>
                  <span class='fadeIn second'>Productimage</span>
                  <input class='fadeIn second' type='text' name='productimage' value='". $p["pimage"] ."' placeholder='Productimage'>
                  <span class='fadeIn second'>Productprice</span>
                  <input class='fadeIn second' type='text' name='productprice' value='". $p["pprice"] ."' placeholder='Productprice'>
                  <span class='fadeIn second'>ProductBTW</span>
                  <input class='fadeIn second' type='text' name='productbtw' value='". $p["pbtw"] ."' placeholder='ProductBTW'>
                  <span class='fadeIn second'>Productdesc</span>
                  <input class='fadeIn second' type='text' name='productdesc' value='". $p["pdesc"] ."' placeholder='Product description'>
                  <input type='hidden' value='$id' >
                  <input type='submit' class='fadeIn third' value='Product wijzigen'>
                  <div>
                    <a class='btn btn-danger fadeIn fourth mb-4' href='index.php?content=adminpanel#assortiment' role='button'>Annuleren</a>
                  </div>
                </form>
                </div>
              </div>";

  echo $string;

}

function updateProduct($id, $name, $image, $price, $btw, $desc) {
  global $conn;

  $sql = "UPDATE `pro4_products` 
            SET `pname` = '$name',
                `pimage` = '$image',
                `pprice` = '$price',
                `pbtw` = '$btw',
                `pdesc` = '$desc'
          WHERE `productid` = '$id';";

  $result = mysqli_query($conn, $sql);

  return $result;
}

?>