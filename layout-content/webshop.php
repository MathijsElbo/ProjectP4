<div class="container" id="app">
  <div class="row">
 
 <div class="form-inline mr-auto mt-1">
  <label class="font-weight-bold mr-2" for="formMax">max</label>
   <input type="text" id="formMax" class="form-control w-25" v-model="maximum">  
 </div>
  

 <input type="range" class="custom-range" min="0" max="200" v-model="maximum">
 </div>
  <div class="row d-flex mb-3 align-items-center"
       v-for="item in products"
       v-if="item.price<=Number(maximum)">
   <div class="col-1 m-auto">
    <button class="btn btn-info">+</button>
   </div>
   <div class="col-4">
    <img class="img-fluid d-block" :src="item.image" :alt="item.name">
   </div>
   <div class="col">
     <h3 class="text-info">{{ item.name }}</h3>
     <p class="mb-0">{{ item.description }}</p>
     <div class="h5 float-right">€{{ Number(item.price) }}</div>     
    </div>
  </div>
</div>