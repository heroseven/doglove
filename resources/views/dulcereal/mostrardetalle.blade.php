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
                    <li role="presentation" class="active"><a  href="/hacerpedido">Productos</a></li>
                    <li role="presentation"><a @click="salir()" href="dulcereal/login">Salir del sistema</a></li>
                </ul>
            </nav>
            <h3 class="text-muted">Wong</h3>
        </div>
        <div class="jumbotron">
            <h1>Golosinas disponibles</h1>
            <p class="lead">A continuación podrás ver las golosinas disponibles para que puedas realizar todos los pedidos que quieras.</p>

        </div>
             @if(Session::get('mensaje'))
             
            <div class="alert alert-success">
                
                  {{Session::get('mensaje')}}
            </div>
              
            @endif
      <div class="row marketing">
        <div class="col-md-12">
          
        
        <div class="panel panel-default table-responsive">

        
                    
                    
            <form action="/mostrardetalle" method="post" class="form-signin" role="form">
           
            <table class="table table-hover table-responsive">
            <thead> 
                <tr> 
                   
                    <th>Nombre</th> 
                    <th>Descripcion</th> 
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr> 
            </thead> 
            <tbody> 
             @foreach($productos as $producto)
                <tr>
                        
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->description}}</td> 
                        <td>{{$producto->precio}}</td>
                        <td><input tabindex="1" type="text" name="cantidades[]"  value=""/></td>
                       <td><input tabindex="1" type="hidden" name="identificadores[]"  value="{{$producto->id}}"/></td>
                </tr> 
            @endforeach
                <tr>
                   
                    
                </tr>
    
            </tbody>
            </table> 
            <input  class="pull-right btn btn-default" type="submit" value="Confirmar pedido">
           
        </form>
            
            
        </div>
        
        
        
        </div>

       
      </div>
      
      
      <footer class="footer">
        <p>&copy; 2015 Arqui Software, Inc.</p>
      </footer>

    </div> <!-- /container -->


   
   
  </body>
</html>
