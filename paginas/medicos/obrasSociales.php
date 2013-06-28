<?php
$activo = "medico";
include '../conectar.php';

$idMedico = $_GET['id'];
?>
<!DOCTYPE html>
<html>
    <head>
<title>Agregar Obra Social</title>
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
            <h3> Agregar obra social <br>
                
            </h3>
        <div>
           
            <a href="/SAT/paginas/medicos/altaObra.php?id=<?php echo $idMedico?>">
                    <button class="btn btn-warning btn-primary">
                    Agregar Obra <i class="icon-plus icon-white"></i>
                    </button>
                </a>
            <a class="btn" href="/SAT/paginas/medicos/listar.php">
                    Volver
                    </a>
            
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
              $query = "SELECT medico_id as id, obrasocial_id as idObra, nombre from medicos_obrasociales
                        INNER JOIN obrasocial on (medicos_obrasociales.obrasocial_id = obrasocial.id)
                        WHERE medico_id = '$idMedico' and eliminado= 0";
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result)) {
                 $estilo = "";
                 
              ?>
              <tr class="<?php echo $estilo ?>">  
                <td id="centrado" class="span2"><?php echo $row["nombre"]; ?></td>
                <td id="centrado" class="span2">
        
                    <a id="borrar" class="btn btn-danger btn-small" href="procesarBorrarObra.php?id=<?php echo $row["idObra"]?>&idMedico=<?php echo $idMedico ?>">
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
