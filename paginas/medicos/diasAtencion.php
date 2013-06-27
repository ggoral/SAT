<?php
$activo = "medico";
include '../conectar.php';

$idMedico = $_GET['id'];
?>
<!DOCTYPE html>
<html>
    <head>
<title>Agregar Dia de atencion</title>
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
            <h3> Dias de atencion <br>
                
            </h3>
        <div>
           
            <a href="/SAT/paginas/medicos/altaDia.php?id=<?php echo $idMedico?>">
                    <button class="btn btn-warning btn-primary">
                    Agregar Dia <i class="icon-plus icon-white"></i>
                    </button>
                </a>
            
            <br><br>
                <table id="tabla" class="table table-striped table-bordered table-condensed ">  
            <thead>  
              <tr>   
                <th id="centrado">Dia <a href="#"><i class="icon-chevron-down"></i></a></th>  
                <th id="centrado">Horario desde <a href="#"><i class="icon-chevron-down"></i></a></th> 
                <th id="centrado">Horario hasta <a href="#"><i class="icon-chevron-down"></i></a></th>         
                <th id="centrado">Acciones</th> 
              </tr>  
            </thead>
            <tbody>   
              <?php 
              $query = "SELECT medico_id as id, id as idDia, dia, horaDesde, horaHasta from diasatencion
                        WHERE medico_id = '$idMedico'";
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result)) {
                 $estilo = "";
                 
              ?>
              <tr class="<?php echo $estilo ?>">  
                <td id="centrado" class="span3"><?php echo $row["dia"]; ?></td>
                <td id="centrado" class="span3"><?php echo $row["horaDesde"]; ?></td>  
                <td id="centrado" class="span3"><?php echo $row["horaHasta"]; ?></td>
                <td id="centrado" class="span7">
        
                    <a id="borrar" class="btn btn-danger btn-small" href="procesarBorrarDia.php?id=<?php echo $row["idDia"]?>">
                        Borrar <i class="icon-remove"></i>
                    </a>
                    <a class="btn btn-success btn-small" href="modificarDia.php?dia=<?php echo $row["dia"]?>&id=<?php echo $row["id"]?>">
                        Modificar <i class="icon-pencil"></i> 
                              </a>  
                </td>
              </tr>
               <?php 
              }
              ?>
            </tbody>  
          </table>
        </div>       
        </div>        <!--Fin Container-->
        
          </body>
</html>
