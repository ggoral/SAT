<?php include "../conectar.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "../modulos/head.php" ?>  
    <title>Secretaria</title>
    <style type="text/css"> 
body { 
background: url('/SAT/img/background.png');
background-repeat: repeat;
}
</style> 
  </head>
  <body>     
     <!--NavBar-->
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
                    <div class="container">
                        <a href="#" class="brand">SAT - Sistema de Administración de Turnos</a>
                        <div class="nav-collapse collapse">
                            <ul class="nav pull-right"><li class="divider-vertical"></li>
                                <li class="active"><a href="/SAT/paginas/turnos/listarTurnosSecretaria.php">Turnos</a></li><li class="divider-vertical"></li>
                                <li><a href="#">Pacientes</a></li><li class="divider-vertical"></li>
                                <li><a href="/SAT/paginas/ObraSocial/listar.php">Obras Sociales</a></li><li class="divider-vertical"></li>
                                <li><a href="#">Especialidades</a></li><li class="divider-vertical"></li>
                            </ul>
                        </div>
                    </div>
                </div>
	</div>
      <!-- Fin NavBar-->
    <div class="container">
            <h3>
                Administrar Turnos <br>
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
                <th id="centrado">Horario <a href="#"><i class="icon-chevron-down"></i></a></th>
                <th id="centrado">Asistencia</th>
                <th id="centrado">Acciones</th> 
              </tr>  
            </thead>  
            <tbody>   
              <?php 
              $query = "SELECT p2.nombre as nomPaciente,p1.nombre as nomMedico,
                        p2.apellido as apePaciente, p1.apellido as apeMedico,
                        t.fecha_desde, t.asistencia, t.id, t.eliminado  
                        FROM turno t
                        INNER JOIN medico AS m ON ( m.id = t.medico_id ) 
                        INNER JOIN paciente AS pa ON ( pa.id = t.paciente_id ) 
                        INNER JOIN persona AS p1 ON ( p1.id = m.id ) 
                        INNER JOIN persona AS p2 ON ( p2.id = pa.id ) 
                        ORDER BY t.fecha_desde";
              $result=  mysql_query($query);
              while ($row = mysql_fetch_array($result)) {
                  $fechayhora= new \DateTime($row["fecha_desde"]);
                  if($row["eliminado"] == 0){
                  ?>
                <tr class='<?php $clase=($row["asistencia"] == false)?'warning':'success';echo $clase; ?>'> 
                <td><?php echo $row["nomPaciente"]." ".$row["apePaciente"]?></td>     
                <td><?php echo $row["nomMedico"]." ".$row["apeMedico"]?></td>  
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
    </body>        
    
    <footer>   
</footer>
</html>