 var vm = new Vue({
            
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
            
            el:'#app',
            data:{
                categorias:[
                    {nombre:'nombre'},
                    {nombre:'descripcion'},
                    {nombre:'precio'}
                ],
                toggle:false,
                nombre:'',
                productos:'',
                nproducto:{
        			nombre: '',
        			descripcion: '',
        			precio: ''
		        },
                hermanos:[
                    {nombre: 'barbarita'},
                    {nombre: 'andrea'},
                    {nombre: 'christopher'}
                ],
            },
            
            methods:{
                salir:function(){
                     var ConfirmBox = confirm("¿Seguro desea salir del sistema?")
                  
			        if(ConfirmBox)
			        window.location.href = "login";
                },
                mostrar:function(){
                    this.$http.get('pedido').then(
                       function (data) {
                           
                            vm.$set('productos', data.json())
                           
                       }
                      
                    );
                },
                eliminar: function(producto){
                    
                    var ConfirmBox = confirm("¿Estas seguro de eliminar el producto?")
                  
			        if(ConfirmBox) this.$http.delete('pedido/' + producto.id)
                    
                    //  this.productos.$remove(producto)
                    this.mostrar()
                    
                },
                 actualizar: function(producto){
                    Vue.set(producto, 'actualizar', true)

                },
                 actualizar2: function(producto){
                     
                     var nproducto=this.nproducto;
                     Vue.http.patch('pedido/'+ producto.id, nproducto,function(){
                         
                     })
                    
                    Vue.set(producto, 'actualizar', false)

                },
                crear: function(){
                    
                    
                    
                    this.productos.push(this.nproducto)
                    Vue.http.post('pedido', this.nproducto)
                    
                   
                    this.nproducto={nombre: '',descripcion: '',precio: ''}
                    
                    
                    
                }
            }
        })
        
        