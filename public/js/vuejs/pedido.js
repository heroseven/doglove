// register modal component
Vue.component('modal', {
    template: '#modal-template',
    props: {
        show: {
            type: Boolean,
            required: true,
            twoWay: true
        }
    }
})
function findById(items, id) {
    for (var i in items) {
        if (items[i].id == id) {
            return items[i];
        }
    }

    return null;
}
var vm;
vm = new Vue({
    components: {
        alert: VueStrap.alert
    },

    ready(){
        this.$http.get('pedido').then(
            function (data) {

                vm.$set('productos', data.json())

            },
            function (data) {
                alert('No hay conexión con el servidor.')
            }
        );
    },

    el: '#app',
    data: {
        showRight: false,
        showTop: false,
        showModal: false,
        nombre: '',
        productos: '',
        popup_producto: '',
        cantidad: ''

    },

    methods: {
        enviar_pedido: function (producto) {
            this.$http.post('pedido', {id: producto.id, cantidad: this.cantidad}).then(
                function (response) {
                    //alert(response.data)
                    this.showModal = false
                    this.showRight = !this.showRight
                }, function () {
                    alert('error de servidor');
                });

        },


        popup: function (id) {
            this.showModal = true
            this.popup_producto = findById(this.productos, id)

        },
        salir: function () {
            var ConfirmBox = confirm("¿Seguro desea salir del sistema?")

            if (ConfirmBox)
                window.location.href = "login";
        },
        mostrar: function () {
            this.$http.get('pedido').then(
                function (data) {

                    vm.$set('productos', data.json())

                }
            );
        },
        eliminar: function (producto) {

            var ConfirmBox = confirm("¿Estas seguro de eliminar el producto?")

            if (ConfirmBox) this.$http.delete('pedido/' + producto.id)

            //  this.productos.$remove(producto)
            this.mostrar()

        },
        actualizar: function (producto) {
            Vue.set(producto, 'actualizar', true)

        },
        actualizar2: function (producto) {

            var nproducto = this.nproducto;
            Vue.http.patch('pedido/' + producto.id, nproducto, function () {

            })

            Vue.set(producto, 'actualizar', false)

        },
        crear: function () {


            this.productos.push(this.nproducto)
            Vue.http.post('pedido', this.nproducto)


            this.nproducto = {nombre: '', descripcion: '', precio: ''}


        }
    }
});
        
        