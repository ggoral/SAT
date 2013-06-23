<?php include "../conectar.php" ?>
<?php $activo = "especialidad"?>




<?php 
// ESTE CODIGO ES ESCENCIAL PARA QUE FUNCIONE EL PAGINADOR
// LA QUERY SIEMPRE TIENE QUE IR PRIMERO
// EL MISMO CALCULADOR NOS VA A DEVOLVER EL RESULT PARA PROCESAR!

$query = "Select * from especialidad where eliminado = false";
$tam_pag = 3;
include "../modulos/CalculadorPaginas.php";

?>



<!DOCTYPE html>
<html>
  <head>
    <title>Especialidades</title>
    <?php include "../modulos/head.php" ?>
  </head>
  <body>     
     <!--NavBar-->
     <?php include "../modulos/navBar.php" ?>
      <!-- Fin NavBar-->
    <div class="container">
            <h3> Especialidades <br>
                
            </h3>
        <div class="offset3">
            <div class="span5"id="centrado">
            <a href="/SAT/paginas/Especialidad/alta.php">
                    <button class="btn btn-warning btn-primary">
                    Nueva Especialidad <i class="icon-plus icon-white"></i>
                    </button>
                </a>
            </div>
            <br><br>
        <table id="tabla" class="table table-striped table-bordered table-condensed span5">  
            <thead>  
              <tr>   
                <th id="centrado">Nombre <a href="#"><i class="icon-chevron-down"></i></a></th>  
                <th id="centrado">Acciones</th> 
              </tr>  
            </thead>
            <tbody>   
              <?php 
              //$query = "Select * from especialidad where eliminado = false";
              //$result=  mysql_query($query);
              while ($row = mysql_fetch_array($result)) {
                  $estilo = "";
                  if ($row["habilitada"] == 0) {$estilo = "error";}
              ?>
              <tr class="<?php echo $estilo ?>">  
                <td id="centrado" class="span3"><?php echo $row["nombre"]; ?></td>  
                <td id="centrado" class="span7">
        
                    <a id="borrar" class="btn btn-danger btn-small" href="procesarBorrarEspecialidad.php?id=<?php echo $row["id"]?>">
                        Borrar <i class="icon-remove"></i>
                    </a>
                    <a class="btn btn-success btn-small" href="modificar.php?id=<?php echo $row["id"]?>">
                        Modif. Nombre <i class="icon-pencil"></i> 
                    </a>
                    <?php if ($row["habilitada"] == 0){?>
                        <a class="btn btn-info btn-small" href="habilitarEspecialidad.php?id=<?php echo $row["id"]?>">
                            Habilitar <i class="icon-ok"></i> 
                        </a>
                    <?php }else {?>
                        <a class="btn btn-info btn-small" href="deshabilitarEspecialidad.php?id=<?php echo $row["id"]?>">
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
        
        
        <?php include "../modulos/paginas.php" ?>
       
          
        </div>        <!--Fin Container-->
    </body>
         
    <footer>   
</footer>
</html>
