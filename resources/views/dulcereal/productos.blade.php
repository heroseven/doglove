<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <!--<div class="header clearfix">-->
      <!--  <nav>-->
      <!--    <ul class="nav nav-pills pull-right">-->
      <!--      <li role="presentation" class="active"><a href="#">Home</a></li>-->
      <!--      <li role="presentation"><a href="#">About</a></li>-->
      <!--      <li role="presentation"><a href="#">Contact</a></li>-->
      <!--    </ul>-->
      <!--  </nav>-->
      <!--  <h3 class="text-muted">Project name</h3>-->
      <!--</div>-->

      <!--<div class="jumbotron">-->
      <!--  <h1>Jumbotron heading</h1>-->
      <!--  <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>-->
      <!--  <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>-->
      <!--</div>-->

      <div class="row marketing">
        <div id="app" class="col-md-12">
          
        
        <div class="panel panel-default">  
        <div class="panel-heading">Panel heading</div>  
        <form action="" method="post" class="form-signin" role="form">
            <form action="productos" method="post" class="form-signin" role="form">
        <table class="table"> 
        <thead> 
            <tr> 
                <th>#</th> 
                <th>Nombre</th> 
                <th>Descripcion</th> 
                <th>Precio</th>
                <th>Cantidad</th> 
            </tr> 
        </thead> 
        <tbody> 
            <tr v-for="producto in productos">
                <template v-if="!producto.actualizar">
                    <th><input type="checkbox" name="@{{producto.id}}" value="@{{producto.id}}"></th> 
                    <td>@{{producto.nombre}}</td> 
                    <td>@{{producto.descripcion}}</td> 
                    <td>@{{producto.precio}}</td> 
                    <td>
                        
                        <input type="text" value="@{{producto.cantidad}}" class="form-control"/>
                        
                           
                    </td>
                </template>
                <template v-else>
                    <th scope="row"></th> 
                    <td><input type="text" class="form-control" v-model="producto.nombre"/></td> 
                    <td><input type="text" class="form-control" v-model="producto.descripcion"/></td> 
                    <td><input type="text" class="form-control" v-model="producto.precio"/></td> 
                    <td>
                        <a href="#"><span @click="actualizar2(producto)" class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                    </td>
                </template> 
            </tr> 
            <tr>
                
                
            </tr>

        </tbody> 
        <button type="submit">Enviar pedido</button>
        </table> 
        </form>
       
            <span style="float:right"> <button @click="salir()">Salir del sistema</button></span>
            </div>
        
        
        
        <!--<pre>@{{$data|json}}</pre>-->
        
        </div>

       
      </div>
      
      
      <footer class="footer">
        <p>&copy; 2015 Arqui Software, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <script src="../bower_components/vue/dist/vue.js"></script>
    <script src="../bower_components/vue-resource/dist/vue-resource.js"></script>
    <script>
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
        
        
    </script>
  </body>
</html>