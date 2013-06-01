<?php include "../conectar.php" ?>
<!DOCTYPE html>
<html>
  <head>
    
    
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
                                <li class="active"><a href="/SAT/paginas/ObraSocial/listar.php" >Obras Sociales</a></li><li class="divider-vertical"></li>
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
        
                    <a id="borrar" class="btn btn-danger btn-small" href="procesarBorrarOS.php?id=<?php echo $row["id"]?>">
                        Borrar <i class="icon-remove"></i>
                    </a>
                    <a class="btn btn-success btn-small" href="modificar.php?id=<?php echo $row["id"]?>">
                        Modificar <i class="icon-ok"></i> 
                    </a>
        
                </td>

              </tr>
              <?php 
              }
              ?>
            </tbody>  
          </table>
            <!--
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
            -->
        </div>        <!--Fin Container-->
    </body>
         
    <footer>   
</footer>
</html>
