<?php include "../conectar.php";
$activo = "paciente";
include "procesarFiltro.php";
include "procesarSeguridad.php";?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "../modulos/head.php" ?>  
    <title>Pacientes</title>
<script type="text/javascript" src="/SAT/js/pacientes.js"></script>
<script type="text/javascript" src="/SAT/js/validacionesGenericas.js"></script> 
  </head>
  <body>
  <!--NavBar-->
  <?php include "../modulos/navBar.php" ?>
  <!-- Fin NavBar-->
      <div class="container">
            <h3>
                Pacientes en el sistema  
            </h3>
            <hr>
            <h5 class="text-info">Buscador:</h5>
            <form class="form-search" action="listar.php" method="GET" id="formBusqueda">
                <?php $queryOS = "select * from obrasocial where habilitada=true and eliminado=false";
                      $resultado = mysql_query($queryOS);      
                ?>
                <fieldset>
<!--                    <legend>Buscar</legend>-->
                <input type="text" placeholder="Apellido y/o Nombre..." class="span2 search-query" id ="nombyApe"name="nombyApe" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off">
                <input type="text" id="dni" name="dni" placeholder="DNI..." class="span2 search-query" autocomplete="off">
                <input type="text" id="provincia" name="provincia" placeholder="Provincia..." class="span2 search-query" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                <input type="text" id="localidad" name="localidad" placeholder="Localidad..." class="span2 search-query" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                <select name="obrasocial">
                    <option value="">Obra Social</option>
                    <?php while($OS = mysql_fetch_array($resultado)){?>
                    <option value="<?php echo $OS['id']?>"><?php echo $OS['nombre']?></option>
                    <?php }?>
                </select>
                <a class="btn btn-info btn-small" id="botonBuscar" href="#">Buscar Paciente <i class="icon-search icon-white"></i></a>
                </fieldset>
            </form>
            <hr>
          <table id="tabla" class="table table-striped table-bordered table-condensed">  
            <thead>  
              <tr>   
                <th id="centrado">DNI</th>  
                <th id="centrado">Apellido y nombre<a href="listar.php?ordenApe=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenApe=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                <th id="centrado" class="span1">Provincia <a href="listar.php?ordenProv=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenProv=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a</th>
                <th id="centrado" class="span1">Localidad <a href="listar.php?ordenLoc=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenLoc=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                <th id="centrado">Calle</th>
                <th id="centrado">N° Casa</th>
                <th id="centrado">Teléfono</th>
                <th id="centrado">Email</th>
                <th id="centrado">Obras Sociales</th> 
              </tr>  
            </thead>  
            <tbody>   
              <?php 
              $query = "SELECT DISTINCT (pe.id),pe.dni,pe.apellido,pe.nombre,pro.nombre as provincia,l.nombre as localidad,pe.calle,pe.numero,
                        pe.telefono,pe.email, pe.eliminado ".$campoOSid."
                        FROM persona as pe
                        INNER JOIN paciente as pa ON (pa.id = pe.id)
                        INNER JOIN localidad as l ON (pe.localidad_id = l.id)
                        INNER JOIN provincia as pro ON (pro.id = l.provincia_id)
                        ".$traerObras."
                        WHERE pe.eliminado = 0".$buscador."
                        ORDER BY".$filtro;
              
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result) or die(mysql_error())) {
                  if($row["eliminado"] == 0){
                  ?>
                <tr class=''> 
                    <td id="centrado"><?php echo $row['dni'] ?></td>
                    <td id="centrado"><?php echo $row['apellido']." ".$row['nombre']?></td>
                    <td id="centrado"><?php echo $row['provincia'] ?></td>
                    <td id="centrado"><?php echo $row['localidad'] ?></td>
                    <td id="centrado"><?php echo $row['calle'] ?></td>
                    <td id="centrado"><?php echo $row['numero'] ?></td>
                    <td id="centrado"><?php echo $row['telefono'] ?></td>
                    <td id="centrado"><?php echo $row['email'] ?></td>
                    <td id="centrado">
                                    <?php
                                    $idPaciente = $row['id'];
                                    $consulta = "SELECT o.nombre,o.habilitada from obrasocial as o
                                                 INNER JOIN pacientes_obrasociales as po ON (po.obrasocial_id = o.id)
                                                 WHERE po.paciente_id = $idPaciente";
                                    $resultado = mysql_query($consulta);
                                    while ($os = mysql_fetch_array($resultado)){
                                        ?> <span class="<?php if ($os['habilitada'] == 0){echo "text-error";}?>">
                                        <?php echo $os['nombre']; if(mysql_num_rows($resultado) > 1) echo ",";?>
                                        <?php if ($os['habilitada'] == 0){echo "(deshabilitada)";}?></span>
                                    <?php }?>
                                            
                    </td>
                </tr> 
            <?php }}?>
            </tbody>  
          </table>
          </div>
            <footer class="footer"> ALGOOOOOOOO </footer>
  </body>        
    

</html>