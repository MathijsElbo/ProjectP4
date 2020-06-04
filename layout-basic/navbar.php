<?php $content = (isset($_GET['content']) ? $_GET['content'] : false); ?>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <div class="row">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-title">
        <h2>Postersz</h2>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="<?php if ($content == 'homepage') echo 'active' ?>">
            <a href="./index.php?content=homepage">Home</a></li>
          <li class="<?php if ($content == 'webshop') echo 'active' ?>">
            <a href="index.php?content=webshop">Webshop</a></li>
          <li class="<?php if ($content == 'overons') echo 'active' ?>">
            <a href="index.php?content=overons">Over ons</a></li>
          <li class="<?php if ($content == 'contact') echo 'active' ?>">
            <a href="index.php?content=contact">Contact</a></li>
        </ul>
      </div>
      <div class="nav-icons">
        <a href="index.php?content=basket"><i class="fas fa-shopping-cart"></i></a>
        <a href="index.php?content=redirect"><i class="fas fa-user"></i></a>
        <?php if (isset($_SESSION["id"])) {
            echo "<a href='index.php?content=uitloggen'><i class='fas fa-sign-out-alt'></i></a>";
          } 
        ?>
      </div>
    </div>
  </div>
</nav>