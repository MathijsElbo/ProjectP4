<?php
// Include connection and functions
include("./php-scripts/connectDB.php");
include("./php-scripts/functions.php");

// Ophalen van alle user info
$sql = "SELECT * FROM `pro4_products`;";
$result = mysqli_query($conn, $sql);

$products = "";

while ($product = mysqli_fetch_assoc($result)) {
  $products .= "
  <div class='row product-align-center mb-1'>
    <div class='col-3'>
      <img class='img-fluid d-block' src='./assets/img/". $product["pimage"] ."' alt='". $product["pname"] ."'
    </div>
    <div class='col-4'>
      <a href=''><span class='product-name'> ". $product["pname"] ." </span></a>
      <p class='mb-0>". $product["pdesc"] ."</p>
    </div>
    <div class='col-4'>
      <span class='product-price'>€ ". $product["pprice"] ."</span>
      <form action='index.php?content=addToCart' method='post'>
      <select class='form-control product-quantity' id='quantity' name='quantity'>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
      <input type='hidden' value='1' name='productid'>
      <button type='submit' title='Add to cart' class='btn btn-info'>+</button>
    </form>";
}

while ($product = mysqli_fetch_assoc($result)) {
  $products .= "
  <div class='card col-4'>
  <img class='product-img img-fluid' src='./assets/img/". $product["pimage"] ."' alt='Card image cap'>
  <div class='card-body'>
    <h5 class='product-name'>". $product["pname"] ."</h5>
    <p class='card-text'>". $product["pdesc"] ."</p>
    <a href='#' class='btn btn-primary'>Go somewhere</a>
  </div>
</div>

  ";
var_dump($products);

echo $products;
?>

