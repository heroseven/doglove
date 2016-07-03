// register the grid component
Vue.component('demo-grid', {
  template: '#grid-template',
  props: {
    data: Array,
    columns: Array,
    filterKey: String
  },
  //ordenar la lista segun campo al mostrar la primera vez
  data: function () {
    var sortOrders = {}
    this.columns.forEach(function (key) {
      sortOrders[key] = 1
    })
    return {
      sortKey: '',
      sortOrders: sortOrders
    }
  },
  //ordenar al clickear 
  methods: {
    sortBy: function (key) {
      this.sortKey = key
      this.sortOrders[key] = this.sortOrders[key] * -1
    }
  }
})

// bootstrap the demo
var demo = new Vue({
  el: '#demo',
  data: {
    searchQuery: '',
    gridColumns: ['name', 'power','age'],
    gridData: [
      { name: 'Chuck Norris', power: Infinity, age:20 },
      { name: 'Bruce Lee', power: 9000, age:25 },
      { name: 'Jackie Chan', power: 7000 , age:203},
      { name: 'Jet Li', power: 8000 , age:202}
    ]
  }
})