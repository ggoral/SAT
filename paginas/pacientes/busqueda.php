<?php include "../conectar.php";
$activo = "paciente";
include "procesarBusqueda.php";
include "procesarFiltro.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "../modulos/head.php" ?>  
    <title>Pacientes</title>
  </head>
  <body>
  <!--NavBar-->
  <?php include "../modulos/navBar.php" ?>
  <!-- Fin NavBar-->
      <div class="container">
            <h3>
                Resultados de busqueda
            </h3>
          
          <table id="tabla" class="table table-striped table-bordered table-condensed">  
            <thead>  
              <tr>   
                <th id="centrado">DNI</th>  
                <th id="centrado">Apellido y nombre<a href="listar.php?ordenApe=ASC"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenApe=DESC"><i class="icon-chevron-up"></i></a></th>
                <th id="centrado" class="span1">Provincia <a href="listar.php?ordenProv=ASC"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenProv=DESC"><i class="icon-chevron-up"></i></a</th>
                <th id="centrado" class="span1">Localidad <a href="listar.php?ordenLoc=ASC"><i class="icon-chevron-down"></i></a> <a href="listar.php?ordenLoc=DESC"><i class="icon-chevron-up"></i></a></th>
                <th id="centrado">Calle</th>
                <th id="centrado">N° Casa</th>
                <th id="centrado">Teléfono</th>
                <th id="centrado">Email</th>
                <th id="centrado">Obras Sociales</th> 
                <th id="centrado">Eliminar</th>
                <th id="centrado">Editar</th>
              </tr>  
            </thead>  
            <tbody>   
              <?php 
              $query = "SELECT DISTINCT (pe.id),pe.dni,pe.apellido,pe.nombre,pro.nombre as provincia,l.nombre as localidad,pe.calle,pe.numero,
                        pe.telefono,pe.email, pe.eliminado
                        FROM persona as pe
                        INNER JOIN paciente as pa ON (pa.id = pe.id)
                        INNER JOIN localidad as l ON (pe.localidad_id = l.id)
                        INNER JOIN provincia as pro ON (pro.id = l.provincia_id)
                        WHERE (pe.eliminado = 0)".$criterioBusqueda." 
                        ORDER BY".$filtro;
              
              $result=  mysql_query($query);
              if(mysql_num_rows($result)!= 0){
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
                                    $consulta = "SELECT o.nombre from obrasocial as o
                                                 INNER JOIN pacientes_obrasociales as po ON (po.obrasocial_id = o.id)
                                                 WHERE po.paciente_id = $idPaciente";
                                    $resultado = mysql_query($consulta);
                                    while ($os = mysql_fetch_array($resultado)){
                                    ?>
                                        <?php echo $os['nombre']; if(mysql_num_rows($resultado) > 1) echo ",";?>
                                    <?php }?>
                    </td>
                    <td id="centrado"><a id="borrar" href="borrarPaciente.php?id=<?php echo $row['id']?>"id="borrarPaciente"class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i></a></td>
                    <td id="centrado"><a href="editarPaciente.php?id=<?php echo $row['id']?>" class="btn btn-mini btn-success"><i class="icon-pencil icon-white"></i></a></td>
                </tr> 
            <?php }}?>
            </tbody>  
          </table>
          </div>
            <footer class="footer"> ALGOOOOOOOO </footer>
              <?php }
              else{
                  ?><script>alert('No se encontraron resultados');
                     </script>
                         <?php
              }?>
  </body>        
    

</html>