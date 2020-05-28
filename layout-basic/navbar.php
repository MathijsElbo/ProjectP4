<?php $content = (isset($_GET['content']) ? $_GET['content'] : false); ?>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <div class="row">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-title">
        Webshop-Posters
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="<?php if ($content == 'home') echo 'active' ?>">
            <a href="./index.php?content=homepage">Home</a></li>
          <li class="<?php if ($content == 'webshop') echo 'active' ?>">
            <a href="index.php?content=webshop">Webshop</a></li>
          <li class="<?php if ($content == 'overons') echo 'active' ?>">
            <a href="index.php?content=overons">Over ons</a></li>
          <li class="<?php if ($content == 'contact') echo 'active' ?>">
            <a href="index.php?content=contact">Contact</a></li>
        </ul>
      </div>
      <div class="navbar-icon float-right">
        <a href="">
          <svg class="icon"><use xlink:href="#svg-icon-cart" /></svg>
        </a>
        <a href="">
          <svg class="icon"><use xlink:href="#svg-icon-user" /></svg>
        </a>
      
      </div>
    </div>
  </div>
</nav>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

  <symbol id="svg-icon-user" viewBox="0 0 512 512">
    <path
      d="m256 0c-141.159 0-256 114.841-256 256s114.841 256 256 256 256-114.841 256-256-114.841-256-256-256zm0 482c-124.617 0-226-101.383-226-226s101.383-226 226-226 226 101.383 226 226-101.383 226-226 226z" />
    <path
      d="m256 270c57.897 0 105-47.103 105-105s-47.103-105-105-105-105 47.103-105 105 47.103 105 105 105zm0-180c41.355 0 75 33.645 75 75s-33.645 75-75 75-75-33.645-75-75 33.645-75 75-75z" />
   <path
      d="m424.649 335.443c-19.933-22.525-48.6-35.443-78.649-35.443h-180c-30.049 0-58.716 12.918-78.649 35.443l-7.11 8.035 5.306 9.325c34.817 61.187 100.131 99.197 170.453 99.197s135.636-38.01 170.454-99.198l5.306-9.325zm-168.649 86.557c-55.736 0-107.761-28.197-138.383-74.295 13.452-11.352 30.579-17.705 48.383-17.705h180c17.804 0 34.931 6.353 48.383 17.705-30.622 46.098-82.647 74.295-138.383 74.295z" />
  </symbol>
  
  <symbol id="svg-icon-cart" viewBox="0 -31 512.00026 512">
  <path d="m164.960938 300.003906h.023437c.019531 0 .039063-.003906.058594-.003906h271.957031c6.695312 0 12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531-5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406 6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531 0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0"/><path d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"/><path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"/>  
  </symbol>
  
</svg>