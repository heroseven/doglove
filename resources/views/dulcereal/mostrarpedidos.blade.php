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
            <h1>Pedidos</h1>
            <p class="lead">A continuación podrá ver los pedidos realizados.</p>

        </div>

      <div class="row marketing">
        <div class="col-md-12">
          
        
        <div class="panel panel-default table-responsive">

        
                    
                    
            <form action="/hacerpedido" method="post" class="form-signin" role="form">
           
            <table class="table table-hover table-responsive">
            <thead> 
                <tr> 
                    <th>Pedido</th> 
                    <th>Cliente</th> 
                    
                </tr> 
            </thead> 
            <tbody> 
             @foreach($productos as $producto)
                <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->id_usuario}}</td>
                       
                       
                </tr> 
            @endforeach
                <tr>
                   
                    
                </tr>
    
            </tbody>
            </table> 
            
            <button class="btn btn-default pull-right" type="submit" value="Desencolar"><a href="ponerencola">Desencolar</a></a></button>
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
