<?php include "../conectar.php" ?>
<?php $activo = "medico" ;
include "procesarSeguridad.php";
include "procesarFiltro.php";?>
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
        <h3> Medicos</h3>
        <a class="btn btn-warning btn-primary"href="/SAT/paginas/medicos/alta.php">Nuevo Medico <i class="icon-plus icon-white"></i></a>
            
        <hr>
            <h5 class="text-info">Buscador:</h5>
            <form class="form-search" action="listar.php" method="GET" id="formBusqueda">
                <?php $queryOS = "select * from obrasocial where habilitada=true and eliminado=false";
                      $resultado = mysql_query($queryOS);      
                ?>
                <fieldset>
<!--                    <legend>Buscar</legend>-->
                <input type="text" placeholder="Apellido y/o Nombre..." class="span2 search-query" id ="nombyApe"name="nombyApe" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off">
                <input type="text" id="matricula" name="matricula" placeholder="Matricula" class="span2 search-query" autocomplete="off">
                <input type="text" id="provincia" name="provincia" placeholder="Provincia..." class="span2 search-query" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                <input type="text" id="localidad" name="localidad" placeholder="Localidad..." class="span2 search-query" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                <select name="obrasocial">
                    <option value="">Obra Social</option>
                    <?php while($OS = mysql_fetch_array($resultado)){?>
                    <option value="<?php echo $OS['id']?>"><?php echo $OS['nombre']?></option>
                    <?php }?>
                </select>
                <button class="btn btn-info btn-small" id="botonBuscar" href="#">Buscar Paciente <i class="icon-search icon-white"></i></button>
                </fieldset>
            </form>
            <hr>
            <!-- Fin BUSCADOR-->
            
            
            <br><br>
        <table id="tabla" class="table table-striped table-bordered table-condensed ">  
            <thead>  
              <tr>
                <th id="centrado">Matricula</th>
                <th id="centrado">Médico <a href="listar.php?ordenApe=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenApe=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                <th id="centrado">Especialidad <a href="listar.php?ordenEsp=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenEsp=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                <th id="centrado">Provincia<a href="listar.php?ordenProv=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenProv=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th> 
                <th id="centrado">Localidad <a href="listar.php?ordenLoc=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenLoc=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                <th id="centrado">Dirección</th>    
                <th id="centrado">Tel.</th>
                <th id="centrado">Acciones</th> 
              </tr>  
            </thead>
            <tbody>   
              <?php 
              $query = "SELECT medico.id, pe.nombre AS nombreP, pe.apellido, pe.calle, pe.numero, pe.telefono, matricula, l.nombre AS localidad, especialidad.nombre AS nombreE, pro.nombre AS provincia
    
                        FROM medico
                        INNER JOIN persona AS pe ON ( medico.id = pe.id ) 
                        INNER JOIN medicos_especialidades ON ( medico.id = medicos_especialidades.medico_id ) 
                        INNER JOIN especialidad ON ( medicos_especialidades.especialidad_id = especialidad.id ) 
                        INNER JOIN localidad AS l ON ( pe.localidad_id = l.id ) 
                        INNER JOIN provincia AS pro ON ( pro.id = l.provincia_id )
                        WHERE pe.eliminado = FALSE ".$buscador."
                        ORDER BY ".$filtro;
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result)) {
                 $estilo = "";
                 
              ?>
              <tr class="<?php echo $estilo ?>">  
                <td id="centrado" class="span3"><?php echo $row["matricula"]; ?></td>  
                <td id="centrado" class="span3"><?php echo $row['apellido']." ".$row["nombreP"]; ?></td>
                <td id="centrado" class="span3"><?php echo $row["nombreE"]; ?></td>
                <td id="centrado" class="span3"><?php echo $row["provincia"]; ?></td>
                <td id="centrado" class="span3"><?php echo $row["localidad"]; ?></td>
                <td id="centrado" class="span3"><?php echo $row["calle"]."  #".$row['numero']; ?></td>
                <td id="centrado" class="span3"><?php echo $row["telefono"]; ?></td>
                <td id="centrado" class="span10">
        
                    <a id="borrar" class="btn btn-danger btn-mini" href="procesarBorrarMedico.php?id=<?php echo $row["id"]?>">
                        Borrar <i class="icon-remove"></i>
                    </a>
                    <a class="btn btn-success btn-mini" href="modificar.php?id=<?php echo $row["id"]?>">
                        Modificar <i class="icon-pencil"></i> 
                    </a>
                     <a class="btn btn-info btn-mini" href="obrasSociales.php?id=<?php echo $row["id"]?>">
                        Obras <i class="icon-plus"></i> 
                    </a>  
                     <a class="btn btn-warning btn-mini" href="diasAtencion.php?id=<?php echo $row["id"]?>">
                        Horarios <i class="icon-plus"></i> 
                    </a>  
                </td>
              </tr>
               <?php 
              }
              ?>
            </tbody>  
          </table>       
        </div>        <!--Fin Container-->
        
          </body>
</html>