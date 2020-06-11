<div class="container">

  <div class="row">
    <div class="form-inline mr-auto mt-1">
      <label class="font-weight-bold mr-2" for="formMax">maximum prijs</label>
      <input type="text" id="formMax" class="form-control w-25" v-model="maximum">
    </div>
    <input type="range" class="custom-range w-50" min="0" max="200" v-model="maximum">
  </div>

  <div class="row product-align-center mb-1" v-for="item in products" v-if="item.price<=Number(maximum)">
    <div class="col-3">
      <img class="img-fluid d-block" :src="item.image" :alt="item.name">
    </div>
    <div class="col-4">
      <a href=""><span class="product-name">{{ item.name }}</span></a>
      <ul class="product-size">
        <li>60 cm x 90 cm</li>
        <li>Katoen</li>
      </ul>
      <p class="mb-0">{{ item.description }}</p>
    </div>
    <div class="col-4">
      <span class="product-price">€ {{ Number(item.price) }}</span>
      <form action="index.php?content=addToCart" method="post">
        <select class="form-control product-quantity" id="quantity" name="quantity">
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
        <input type="hidden" value="1" name="productid">
        <button type="submit" title="Add to cart" class="btn btn-info">+</button>
        <!-- <a title="Add to cart" class="btn btn-info" value="submit" name="submit">+</a> -->
      </form>

    </div>
  </div>
</div>

<!-- <div class="row">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
  </div> -->