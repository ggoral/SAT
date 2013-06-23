<?php include "../conectar.php" ?>
<?php $activo = "turno"?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "../modulos/head.php" ?>  
    <title>Secretaria</title>
  </head>
  <body>     
     <!--NavBar-->
     <?php include "../modulos/navBar.php" ?>
      <!-- Fin NavBar-->
    <div class="container">
            <h3>
                Turnos para el día de hoy <small><em>(<?php echo date("d\/m\/y"); ?>)</em></small><br>
                <a href="altaTurno.php">
                    <button class="btn btn-warning btn-primary">
                    Nuevo turno <i class="icon-plus icon-white"></i>
                    </button>
                </a>
            </h3>
        <table id="tabla" class="table table-striped table-bordered table-condensed">  
            <thead>  
              <tr>   
                <th id="centrado">Paciente <a href="#"><i class="icon-chevron-down"></i></a></th>  
                <th id="centrado">Médico <a href="#"><i class="icon-chevron-down"></i></a></th>
                <th id="centrado">Obra Social<a href="#"><i class="icon-chevron-down"></i></a></th>
                <th id="centrado">Horario <a href="#"><i class="icon-chevron-down"></i></a></th>
                <th id="centrado">Asistencia</th>
                <th id="centrado">Acciones</th> 
              </tr>  
            </thead>  
            <tbody>   
              <?php 
              $query = "SELECT p2.nombre as nomPaciente,p1.nombre as nomMedico,
                        p2.apellido as apePaciente, p1.apellido as apeMedico,
                        t.fecha_desde, t.asistencia, t.id, t.eliminado , os.nombre as osocial 
                        FROM turno t
                        INNER JOIN medico AS m ON ( m.id = t.medico_id ) 
                        INNER JOIN paciente AS pa ON ( pa.id = t.paciente_id ) 
                        INNER JOIN persona AS p1 ON ( p1.id = m.id ) 
                        INNER JOIN persona AS p2 ON ( p2.id = pa.id )
                        INNER JOIN pacientes_obrasociales as po ON (po.paciente_id = pa.id)
                        INNER JOIN obrasocial as os ON (os.id = po.obrasocial_id)
                        WHERE DAY(t.fecha_desde) = DAY(CURRENT_DATE())
                        ORDER BY t.fecha_desde";
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result) or die(mysql_error())) {
                  $fechayhora= new \DateTime($row["fecha_desde"]);
                  if($row["eliminado"] == 0){
                  ?>
                <tr class='<?php $clase=($row["asistencia"] == false)?'warning':'success';echo $clase; ?>'> 
                <td><?php echo $row["nomPaciente"]." ".$row["apePaciente"]?></td>  
                <td><?php echo $row["nomMedico"]." ".$row["apeMedico"]?></td>  
                <td><?php echo $row["osocial"]?></td>
                <td class ="span2" id="centrado"><?php echo $fechayhora->format("d-m-Y H:i:s")?></td>
                <td class ="span2" id="centrado"><?php $mensaje=($row["asistencia"] == false)?'Pendiente':'Asistido';echo $mensaje;?></td>
                <td class ="span3" id="centrado">
                  <?php if($row["asistencia"] == false){?>
                    <a href="cancelar.php?id=<?php echo $row["id"]?>" class="btn btn-danger btn-small">Cancelar <i class="icon-remove"></i></a></a>
                    <a href="asistir.php?id=<?php echo $row["id"]?>" class="btn btn-success btn-small">Asistió <i class="icon-ok"></i>
</a>
                  <?php } else{?><button class="btn btn-danger btn-small disabled">Cancelar <i class="icon-remove"></i></button> <button class="btn btn-success btn-small disabled">Asistió <i class="icon-ok"></i></button><?php }?>
                </td>
                  </tr> <?php }}?>
            </tbody>  
          </table>
            
            <!--<div class="pagination" align="center">
              <ul>
                <li><a href="#">Anterior</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Siguiente</a></li>
              </ul>
            </div>    -->    
        </div>        <!--Fin Container-->
    <footer class="footer">   
    </footer>
  </body>        
</html>