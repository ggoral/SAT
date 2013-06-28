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
            
            <hr>
            <h5 class="text-info">Buscador:</h5>
            <form class="form-search" action="listar.php" method="GET" id="formBusqueda">
                <?php $queryOS = "select * from obrasocial where habilitada=true and eliminado=false";
                      $resultado = mysql_query($queryOS);      
                ?>
                <fieldset>
<!--                    <legend>Buscar</legend>-->
                <input type="text" placeholder="Apellido y/o Nombre..." class="span2 search-query" id ="nombyApe"name="nombyApe" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off">
                <input type="text" id="dni" name="dni" placeholder="Matricula" class="span2 search-query" autocomplete="off">
                <input type="text" id="provincia" name="provincia" placeholder="Provincia..." class="span2 search-query" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                <input type="text" id="localidad" name="localidad" placeholder="Localidad..." class="span2 search-query" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                <select name="obrasocial">
                    <option value="">Obra Social</option>
                    <?php while($OS = mysql_fetch_array($resultado)){?>
                    <option value="<?php echo $OS['id']?>"><?php echo $OS['nombre']?></option>
                    <?php }?>
                </select>
                <a class="btn btn-info btn-small" id="botonBuscar" href="#">Buscar Médico <i class="icon-search icon-white"></i></a>
                </fieldset>
            </form>
            <hr>
            
            
            
            <br><br>
        <table id="tabla" class="table table-striped table-bordered table-condensed ">  
            <thead>  
              <tr>
                <th id="centrado">Matricula</th>
                <th id="centrado">Apellido y Nombre <a href="#"><i class="icon-chevron-down"></i></a></th>
                <th id="centrado">Especialidad <a href="#"><i class="icon-chevron-down"></i></a></th>
                <th id="centrado">Provincia<a href="#"><i class="icon-chevron-down"></i></a></th> 
                <th id="centrado">Localidad <a href="#"><i class="icon-chevron-down"></i></a></th>
                <th id="centrado">Dirección</th>    
                <th id="centrado">Tel.</th>
                <th id="centrado">Acciones</th> 
              </tr>  
            </thead>
            <tbody>   
              <?php 
              $query = "SELECT medico.id, p.nombre AS nombreP, p.apellido,p.calle,p.numero,p.telefono,matricula,l.nombre as localidad, especialidad.nombre AS nombreE
                        , pro.nombre as provincia
                        FROM medico
                        INNER JOIN persona as p ON ( medico.id = p.id ) 
                        INNER JOIN medicos_especialidades ON ( medico.id = medicos_especialidades.medico_id ) 
                        INNER JOIN especialidad ON ( medicos_especialidades.especialidad_id = especialidad.id )           
                        INNER JOIN localidad as l ON ( p.localidad_id = l.id )
                        INNER JOIN provincia as pro ON (pro.id = l.provincia_id)
                        WHERE p.eliminado = false";
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
        </div>       
        </div>        <!--Fin Container-->
        
          </body>
</html>