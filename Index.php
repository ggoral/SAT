<!DOCTYPE html>
<?php include 'paginas/conectar.php'?>
<html lang="es">
   <head>
    <title>Prueba BootStrap</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> 
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen"> 
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
      <!--NavBar-->
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
                    <div class="container">
                        <a href="#" class="brand">SAT // Inicio de sesión</a>
                        <div class="nav-collapse" collapse>
                            <ul class="nav pull-right">
                                <li class="active"><a href="#">INICIO</a></li>
                                <li><a href="#">Item2</a></li>
                                <li><a href="#">Item3</a></li>
                                <li><a href="#">Item4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
	</div>
      <!-- Fin NavBar-->
      <div class="container">
        <form class="well span4" align="center" action="#">
            <h2 class="muted">Ingrese sus datos</h2>
            <input type="text" class="span2" placeholder="Usuario..."></input><br>
            <input type="password" class="span2" placeholder="Contraseña..."></input><br>
            <button type="submit" class="btn btn-info"><i class="icon-user icon-white"></i>Ingresar</button>
        </form>
      </div>
  </body>
  
<footer>
</footer>
</html>