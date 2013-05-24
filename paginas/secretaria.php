<?php include "paginas/conectar" ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Secretaria</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"> 
    <link href="../css/bootstrap-responsive.css" rel="stylesheet" media="screen"> 
  </head>
    <body>
        <h1>Sección secretaria</h1>
        
<table class="table">  
        <thead>  
          <tr>  
            <th>ID</th>  
            <th>Paciente</th>  
            <th>Médico</th>  
            <th>Horario</th>
            <th>Asistencia</th> 
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td>01</td>  
            <td>Christian Tracy</td>  
            <td>Doctor calzado</td>  
            <td>------</td>
            <td>Pendiente</td>  
          </tr>    
          <?php 
          $query = "SELECT * FROM turno ORDER BY id";
          $result=  mysql_query($query);
          while ($row = mysql_fetch_array($result)) {?>
            <tr>  
            <td><?php echo $row["id"]?></td>  
            <td><?php echo $row["medico_id"]?></td>  
            <td><?php echo $row["paciente_id"]?></td>  
            <td><?php echo $row["fecha_desde"]?></td>
            <td><?php echo $row["asistencia"]?></td>  
          </tr>  
          <?php }?>
        </tbody>  
      </table>  

    </body>
    
    <footer>
    
</footer>
<script src="js/jquery-1.9.1"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap-transition.js"></script>
<script src="../assets/js/bootstrap-alert.js"></script>
<script src="../assets/js/bootstrap-modal.js"></script>
<script src="../assets/js/bootstrap-dropdown.js"></script>
<script src="../assets/js/bootstrap-scrollspy.js"></script>
<script src="../assets/js/bootstrap-tab.js"></script>
<script src="../assets/js/bootstrap-tooltip.js"></script>
<script src="../assets/js/bootstrap-popover.js"></script>
<script src="../assets/js/bootstrap-button.js"></script>
<script src="../assets/js/bootstrap-collapse.js"></script>
<script src="../assets/js/bootstrap-carousel.js"></script>
<script src="../assets/js/bootstrap-typeahead.js"></script>
</html>
