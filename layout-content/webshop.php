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
      <ul class="product-size" >
        <li>60 cm x 90 cm</li>
        <li>Katoen</li>
      </ul>
      <p class="mb-0">{{ item.description }}</p>
    </div>
    <div class="col-4">
      <span class="product-price">€ {{ Number(item.price) }}</span>
      <div>
        <select class="form-control product-quantity" id="exampleFormControlSelect1" name="quantity">
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
        <a title="Add to cart" class="btn btn-info" v-on:click="addItem(item)">+</a>
      </div>

    </div>
  </div>
</div>