<?php include "../paginas/conectar.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "../paginas/modulos/head.php" ?>  
    <title>Secretaria</title>
  </head>
  <body>
    <h1>Sección secretaria</h1>      
    <table class="table table-striped">  
        <thead>  
          <tr>   
            <th>Paciente</th>  
            <th>Médico</th>  
            <th>Horario</th>
            <th>Asistencia</th> 
          </tr>  
        </thead>  
        <tbody>   
          <?php 
          $query = "SELECT p2.nombre as nomPaciente,p1.nombre as nomMedico,
                    p2.apellido as apePaciente, p1.apellido as apeMedico,
                    t.fecha_desde, t.asistencia, t.id  
                    FROM Turno t
                    INNER JOIN Medico AS m ON ( m.id = t.medico_id ) 
                    INNER JOIN Paciente AS pa ON ( pa.id = t.paciente_id ) 
                    INNER JOIN Persona AS p1 ON ( p1.id = m.id ) 
                    INNER JOIN Persona AS p2 ON ( p2.id = pa.id ) 
                    ORDER BY t.fecha_desde";
          $result=  mysql_query($query);
          while ($row = mysql_fetch_array($result)) {
              $fechayhora= new \DateTime($row["fecha_desde"]);?>
            <tr>  
            <td><?php echo $row["nomMedico"]." ".$row["apeMedico"]?></td>  
            <td><?php echo $row["nomPaciente"]." ".$row["apePaciente"]?></td>  
            <td><?php echo $fechayhora->format("H:i:s")?></td>
            <td><?php $mensaje=($row["asistencia"] == false)?'Pendiente':'Asistido';echo $mensaje;?></td>  
          </tr><?php }?>
        </tbody>  
      </table>  
    </body>  
    <footer>   
</footer>
<?php include "../paginas/modulos/scripts.php" ?>
</html>