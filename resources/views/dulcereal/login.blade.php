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

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../signin.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <form action="" method="post" class="form-signin" role="form">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
        {{--<div class="checkbox">--}}
            {{--<label>--}}
                {{--<input type="checkbox" value="remember-me"> Remember me--}}
            {{--</label>--}}
        {{--</div>--}}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Loguearme</button>
    </form>

</div> <!-- /container -->


</body>
</html>
