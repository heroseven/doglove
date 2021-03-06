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
      <link href="../css/productos.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div id="app" class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills pull-right">
                    <li role="presentation" class="active"><a  href="#">Home</a></li>
                    <li role="presentation"><a @click="salir()" href="#">Salir del sistema</a></li>
                </ul>
            </nav>
            <h3 class="text-muted">Wong</h3>
        </div>
        <div class="jumbotron">
            <h1>Golosinas disponibles</h1>
            <p class="lead">A continuación podrás ver las golosinas disponibles para que puedas realizar todos los pedidos que quieras.</p>

        </div>

      <div class="row marketing">
        <div class="col-md-12">
          
        
        <div class="panel panel-default table-responsive">

        <div style="width: 200px;padding: 10px;">Buscar: <input type="text" class="form-control" v-model="nombre"/></div>
        
        {{--<div class="ui simple dropdown ">--}}
               {{--<button class="ui icon button" @click="toggle= !toggle"><i class="ui setting icon">*</i></button>--}}
               {{--<!-- <div v-bind:class="[hidden, toggle ? show : '']">-->--}}

               {{--<div class="left menu" v-bind:class="{'show': toggle, 'hidden':!toggle }">--}}
                    {{--<!--v-for-start-->--}}
                    {{--<div v-for="categoria in categorias" class="item">--}}
                        {{--<div class="ui checkbox">--}}
                            {{--<input type="checkbox">--}}
                            {{--<label>@{{categoria.nombre}}</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                   {{--<!--v-for-end-->--}}
                {{--</div>--}}
        {{--</div>--}}
                    
                    
        <form action="" method="post" class="form-signin" role="form">
            <form action="productos" method="post" class="form-signin" role="form">
        <table class="table table-hover table-responsive">
        <thead> 
            <tr> 
                
                <th>Nombre</th> 
                <th>Descripcion</th> 
                <th>Precio</th>
                <th>Stock</th> 
                <th>Acciones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr> 
        </thead> 
        <tbody> 
            <tr v-for="producto in productos | filterBy nombre | filterBy descripcion" >
                <template v-if="!producto.actualizar">
                   
                    <td>@{{producto.nombre}}</td>
                    <td>@{{producto.descripcion}}</td> 
                    <td>@{{producto.precio}}</td> 
                    <td>@{{producto.stock}}</td>
                    <td>

                        <button class="btn btn-default" type="button" id="show-modal" @click="popup(producto.id)">Hacer pedido</button>
                        <!-- use the modal component, pass in the prop -->
                        <modal :show.sync="showModal">
                            <!--
                              you can use custom content here to overwrite
                              default content
                            -->

                            <span slot="body">
                                <h3>Pedido</h3>
                                <table class="table table-striped">
                                    <tr>
                                        <td>Nombre</td>
                                        <td>@{{popup_producto.nombre}}</td>
                                    </tr>
                                    <tr>
                                        <td>Descripción</td>
                                        <td>@{{popup_producto.descripcion}}</td>
                                    </tr>
                                    <tr>
                                        <td>Stock</td>
                                        <td>@{{popup_producto.stock}}</td>
                                    </tr>
                                    <tr>
                                        <td>Cantidad</td>
                                        <td><input class="form-control" type="text" v-model="cantidad"/></td>

                                </table>
                                <button class="btn btn-default" type="button" class="modal-default-button"
                                @click="enviar_pedido(popup_producto)">
                                        Enviar pedido
                                </button>
                                <button class="btn btn-default" type="button" class="modal-default-button"
                                @click="showModal= false">
                                        Cancelar
                                </button>
                            </span>
                        </modal>
                    </td>
                </template>
                <template v-else>
                   
                    <td><input type="text" class="form-control" v-model="producto.nombre"/></td> 
                    <td><input type="text" class="form-control" v-model="producto.descripcion"/></td> 
                    <td><input type="text" class="form-control" v-model="producto.precio"/></td>
                    <td><input type="text" class="form-control" v-model="producto.cantidad"/></td> 
                    <td>
                        
                        <a href="#"><span @click="actualizar2(producto)" class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                    </td>
                </template> 
            </tr> 
            <tr>
                
                
            </tr>

        </tbody>
        </table> 
        </form>
            <alert
                    :show.sync="showRight"
                    :duration="3000"
                    type="success"
                    width="400px"
                    placement="top-right"
                    dismissable>
                <span class="icon-ok-circled alert-icon-float-left"></span>
                <p>Pedido realizado!</p>
            </alert>
            <span style="float:right"> <button @click="salir()">Salir del sistema</button></span>
            </div>
        
        
        
        {{--<pre>@{{$data|json}}</pre>--}}
        
        </div>

       
      </div>
      
      
      <footer class="footer">
        <p>&copy; 2015 Arqui Software, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <script src="../bower_components/vue/dist/vue.js"></script>
    <script src="../bower_components/vue-resource/dist/vue-resource.js"></script>
    <script src="../bower_components/vue-strap/dist/vue-strap.js"></script>
    <script src="../js/vuejs/pedido.js"></script>
    <!-- template for the modal component -->
    <script type="x/template" id="modal-template">
        <div class="modal-mask" v-show="show" transition="modal">
            <div class="modal-wrapper">
                <div class="modal-container">



                    <div class="modal-body">
                        <slot name="body">
                            default body
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">


                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </script>
  </body>
</html>
