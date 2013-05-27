<?php

include '../conectar.php';
$idTipo = $_GET['id'];
$sql = "Select * from Tipos where idTipo = $idTipo";
$resultado = mysql_query($sql);
$dato = mysql_fetch_array($resultado);

?>
<!DOCTYPE html>
<html>
    <head>
    
<!--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     Bootstrap 
    <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../css/estilo.css" rel="stylesheet" media="screen"> 
    <link href="../../css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="../../js/jquery-1.9.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>-->



    
    <title>Modificar Obra Social</title>
 
    <?php include "../modulos/head.php" ?>
    <script type="text/javascript" src="../../js/funciones.js"></script>
    <script>
    $(document).ready(function(){
        
    });
    </script>
    <style type="text/css"> 
    body { 
    background: url('../../img/background.png');
    background-repeat: repeat;
    } 
    
</style> 
  </head>
    
    <body>
        <!--NavBar-->
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
                    <div class="container">
                        <a href="#" class="brand">SAT - Sistema de Administración de Turnos</a>
                        <div class="nav-collapse collapse">
                            <ul class="nav pull-right"><li class="divider-vertical"></li>
                                <li><a href="/SAT/paginas/turnos/listarTurnosSecretaria.php">Turnos</a></li><li class="divider-vertical"></li>
                                <li><a href="#">Pacientes</a></li><li class="divider-vertical"></li>
                                <li class="active"><a href="#">Obras Sociales</a></li><li class="divider-vertical"></li>
                                <li><a href="#">Especialidades</a></li><li class="divider-vertical"></li>
                            </ul>
                        </div>
                    </div>
                </div>
	</div>
      <!-- Fin NavBar-->     
        <div class="container" align="center">
      <div class="span3 offset4"> 
          <fieldset>
                <br>
                <h3>Modificar Obra Social</h3>   
               <form class="well" id="formulario" action="procesarModifcarTipo.php" method="GET "onsubmit="return validarFormTipo()">
                <input id="nombre" type="text" placeholder="Nuevo nombre" name="nombre" value='<?php echo $dato['Tipo']?>'><br>  
                <input name="idTipo" type="hidden" value="<?php echo $dato['idTipo']?>">
                <br>
                <button class="btn btn-success" type="submit">Modificar <i class="icon-ok icon-white"></i></button>
                <a class="btn" href="/SAT/paginas/ObraSocial/listar.php">
                    Cancelar
                </a>
             </form>
          </fieldset>     
      </div>
    </div>            
    </body>
</html>
