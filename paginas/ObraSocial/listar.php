<?php include "../conectar.php" ?>
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



    
    <title>Obras Sociales</title>
 
    <?php include "../modulos/head.php" ?>
    
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
    <div class="container">
            <h3> Obras Sociales <br>
                <a href="/SAT/paginas/ObraSocial/alta.php">
                    <button class="btn btn-warning btn-primary">
                    Nueva Obra Social <i class="icon-plus icon-white"></i>
                    </button>
                </a>
            </h3>
        <table id="tabla" class="table table-striped table-bordered table-condensed">  
            <thead>  
              <tr>   
                <th>Nombre <a href="#"><i class="icon-chevron-down"></i></a></th>  
                <th>Acciones</th> 
              </tr>  
            </thead>
            <tbody>   
              <?php 
              $query = "Select * from obrasocial where eliminado = false";
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result)) {
                
              ?>
              <tr>  
                <td><?php echo $row["nombre"]; ?></td>  
                <td align="center">
        
                    <a id="borrar" class="btn btn-danger btn-small" href="procesarBorrarOS.php?id=<?php echo $row["id"]?>" >
                       Delete <i class="icon-trash"></i> 
                    </a>
                    
                    <a href="modificar.php?id=<?php echo $row["id"]?>">
                        <button class="btn btn-success btn-small"> Modificar 
                            <i class="icon-ok"></i></button> 
                    </a>
        
                </td>

              </tr>
              <?php 
              }
              ?>
            </tbody>  
          </table>
            
            <div class="pagination" align="center">
              <ul>
                <li><a href="#">Anterior</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Siguiente</a></li>
              </ul>
            </div>
            
        </div>        <!--Fin Container-->
    </body>
         
    <footer>   
</footer>
</html>