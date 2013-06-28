<?php include "../conectar.php" ?>
<?php $activo = "medico" ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Medicos</title>
    <?php include "../modulos/head.php" ?>
  </head>
  <body>     
     <!--NavBar-->
     <?php include "../modulos/navBar.php" ?>
      <!-- Fin NavBar-->
      

   <div class="container">
            <h3> Medicos <br>
                
            </h3>
        <div>
           
            <a href="/SAT/paginas/medicos/alta.php">
                    <button class="btn btn-warning btn-primary">
                    Nuevo Medico <i class="icon-plus icon-white"></i>
                    </button>
                </a>
            
            <br><br>
        <table id="tabla" class="table table-striped table-bordered table-condensed ">  
            <thead>  
              <tr>   
                <th id="centrado">Nombre <a href="#"><i class="icon-chevron-down"></i></a></th>  
                <th id="centrado">Apellido <a href="#"><i class="icon-chevron-down"></i></a></th> 
                <th id="centrado">Localidad <a href="#"><i class="icon-chevron-down"></i></a></th>
                <th id="centrado">Matricula</th>
                <th id="centrado">Especialidad <a href="#"><i class="icon-chevron-down"></i></a></th>
                <th id="centrado">Acciones</th> 
              </tr>  
            </thead>
            <tbody>   
              <?php 
              $query = "SELECT medico.id, persona.nombre AS nombreP, apellido, matricula,l.nombre as localidad, especialidad.nombre AS nombreE
                        FROM medico
                        INNER JOIN persona ON ( medico.id = persona.id ) 
                        INNER JOIN medicos_especialidades ON ( medico.id = medicos_especialidades.medico_id ) 
                        INNER JOIN especialidad ON ( medicos_especialidades.especialidad_id = especialidad.id )           
                        INNER JOIN localidad as l ON ( persona.localidad_id = l.id )
                        INNER JOIN provincia as pro ON (pro.id = l.provincia_id)
                        WHERE persona.eliminado = false";
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result)) {
                 $estilo = "";
                 
              ?>
              <tr class="<?php echo $estilo ?>">  
                <td id="centrado" class="span3"><?php echo $row["nombreP"]; ?></td>
                <td id="centrado" class="span3"><?php echo $row["apellido"]; ?></td>  
                <td id="centrado" class="span3"><?php echo $row["localidad"]; ?></td>
                <td id="centrado" class="span3"><?php echo $row["matricula"]; ?></td>
                <td id="centrado" class="span3"><?php echo $row["nombreE"]; ?></td>
                <td id="centrado" class="span12">
        
                    <a id="borrar" class="btn btn-danger btn-small" href="procesarBorrarMedico.php?id=<?php echo $row["id"]?>">
                        Borrar <i class="icon-remove"></i>
                    </a>
                    <a class="btn btn-success btn-small" href="modificar.php?id=<?php echo $row["id"]?>">
                        Modificar <i class="icon-pencil"></i> 
                    </a>
                     <a class="btn btn-info btn-small" href="obrasSociales.php?id=<?php echo $row["id"]?>">
                        Obras <i class="icon-plus"></i> 
                    </a>  
                     <a class="btn btn-warning btn-small" href="diasAtencion.php?id=<?php echo $row["id"]?>">
                        Horarios <i class="icon-plus"></i> 
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