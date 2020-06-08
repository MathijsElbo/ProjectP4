var product = new Vue({
  el: '#product',
  data: {
   maximum: 99,
   products: null,
   cartStatus: false,
   cart: []
  },
  methods: {
    addItem: function(product) {
      this.cart.push(product);
    }
  },
  computed: {
    cartState: function() {
      return this.cartStatus ? 'd-flex': 'd-none'
     }
  },
  mounted: function() {
   fetch('http://webshopproject.net/assets/products/webshop')
   .then(products => products.json())
   .then(data => {
     this.products = data;
   })
  }
 });