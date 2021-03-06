<?php
include "procesarSeguridad.php";
?>

<?php include "../conectar.php" ?>
<?php $activo = "obrasocial";
include "procesarFiltro.php"?>
<!DOCTYPE html>
<html>
  <head>
    <title>Obras Sociales</title>
    <?php include "../modulos/head.php" ?>
  </head>
  <body>     
     <!--NavBar-->
     <?php include "../modulos/navBar.php" ?>
      <!-- Fin NavBar-->
    <div class="container">
            <h3> Obras Sociales <br>
                
            </h3>
        <div class="offset3">
            <div class="span5"id="centrado">
            <a href="/SAT/paginas/ObraSocial/alta.php">
                    <button class="btn btn-warning btn-primary">
                    Nueva Obra Social <i class="icon-plus icon-white"></i>
                    </button>
                </a>
            </div>
            <br><br>
        <table id="tabla" class="table table-striped table-bordered table-condensed span5">  
            <thead>  
              <tr>   
                <th id="centrado">Nombre <a href="listar.php?ordenNom=ASC"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenNom=DESC"><i class="icon-chevron-up"></i></a></th>  
                <th id="centrado">Acciones</th> 
              </tr>  
            </thead>
            <tbody>   
              <?php 
              $query = "Select * from obrasocial as o where eliminado = false ORDER BY ".$filtro."";
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result)) {
                  $estilo = "";
                  if ($row["habilitada"] == 0) {$estilo = "error";}
              ?>
              <tr class="<?php echo $estilo ?>">  
                <td id="centrado" class="span3"><?php echo $row["nombre"]; ?></td>  
                <td id="centrado" class="span7">
        
                    <a id="borrar" class="btn btn-danger btn-small" href="procesarBorrarOS.php?id=<?php echo $row["id"]?>">
                        Borrar <i class="icon-remove"></i>
                    </a>
                    <a class="btn btn-success btn-small" href="modificar.php?id=<?php echo $row["id"]?>">
                        Modif. Nombre <i class="icon-pencil"></i> 
                    </a>
                    <?php if ($row["habilitada"] == 0){?>
                        <a class="btn btn-info btn-small" href="habilitarOs.php?id=<?php echo $row["id"]?>">
                            Habilitar <i class="icon-ok"></i> 
                        </a>
                    <?php }else {?>
                        <a class="btn btn-info btn-small" href="deshabilitarOs.php?id=<?php echo $row["id"]?>">
                           Deshabilitar <i class="icon-remove"></i> 
                        </a>
                    <?php }?>
        
                </td>

              </tr>
              <?php 
              }
              ?>
            </tbody>  
          </table>
        </div>
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
