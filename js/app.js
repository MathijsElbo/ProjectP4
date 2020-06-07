var product = new Vue({
  el: '#product',
  data: {
   maximum: 99,
   products: null
  },
  mounted: function() {
   fetch('http://webshopproject.net/assets/products/webshop')
   .then(products => products.json())
   .then(data => {
     this.products = data;
   })
  }
 });