<?php
$activo = "paciente";
include '../conectar.php';include "procesarSeguridad.php";
$idPaciente = $_GET['id'];
?>
<!DOCTYPE html>
<html>
    <head>
<title>Editar Obras Sociales</title>
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
     <?php include "../modulos/navBar.php" ?>
      <!-- Fin NavBar-->
      
   <div class="container">
       <div class="span5 offset3">
            <h3> Editar Obras Sociales</h3>
            <br>
        <div>
            <a href="altaObra.php?id=<?php echo $idPaciente?>" class="btn btn-warning btn-primary">Agregar Obra <i class="icon-plus icon-white"></i></a>
            <a class="btn" href="/SAT/paginas/pacientes/editarPaciente.php?id=<?php echo $idPaciente?>">Volver</a>
            <br>
            <br>
                <table id="tabla" class="table table-striped table-bordered table-condensed ">  
            <thead>  
              <tr>   
                <th id="centrado">Obra <a href="#"><i class="icon-chevron-down"></i></a></th>  
              </tr>  
            </thead>
            <tbody>   
              <?php 
              $query = "SELECT o.nombre, o.id as idObra FROM obrasocial as o
                        INNER JOIN pacientes_obrasociales as po ON(po.obrasocial_id = o.id)
                        WHERE po.paciente_id = $idPaciente";
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result)) {
                 $estilo = "";
                 
              ?>
              <tr class="<?php echo $estilo ?>">  
                <td id="centrado" class="span2"><?php echo $row["nombre"]; ?></td>
                <td id="centrado" class="span2">       
                    <a id="borrar" class="btn btn-danger btn-small" href="procesarBorrarObra.php?id=<?php echo $row["idObra"]?>&idPaciente=<?php echo $idPaciente ?>">
                        Borrar <i class="icon-remove"></i>
                    </a>            
                </td>
              </tr>
               <?php 
              }
              ?>
            </tbody>  
          </table>
        </div>       
        </div> 
   </div>       
      <!--Fin Container-->
        
          </body>
</html>

