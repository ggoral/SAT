<?php include "../conectar.php" ?>
<?php $activo = "turno" ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "../modulos/head.php";include "procesarSeguridad.php";
    ?> 
    <script type="text/javascript" src="/SAT/js/turnosAlta.js"></script>
    <script type="text/javascript" src="/SAT/js/bootstrap-timepicker.js"></script>
      <script type="text/javascript" src="/SAT/js/bootstrap-timepicker.min.js"></script>
    <title>Alta de turno</title>
    
    <style type="text/css"> 
        body { 
        background: url('/SAT/img/background.png');
        background-repeat: repeat;
        }
    </style> 
  </head>
  <?php 
  //Consultas MYSQL 
  $queryEsp = "select * from especialidad";
  $resultEsp = mysql_query($queryEsp);
  
 
  
  ?>
  <body>     
     <!--NavBar-->
  <?php include "../modulos/navBar.php" ?>
  <!-- Fin NavBar-->
        <div class="container">
            <div class="offset4 span3">
                <h3 align="center">NUEVO TURNO</h3>
                <form class ="well" id ="formAltaTurno" action="crearTurno.php" method="post">
                    <fieldset>
                        <label>DNI de paciente:</label>
                        <input id="dni" type="text" name="dni" autocomplete="off"></input><div id="mensajePaciente"></div><!--  mensaje de error cuando no esta el paciente-->
                        <label>Seleccione Obra Social:</label> 
                        <select id="obraSocial" name="obraSocial">
                            <option value="0">Seleccione obra social</option>
                        </select>
                        <div id="mensajeObraSocial"></div>
                        <label>Seleccione especialidad del médico:</label>
                        <select id="especialidad" name="especialidad">
                            <option value="">Seleccione Especialidad</option>
                        <?php 

                         while($especialidad = mysql_fetch_array($resultEsp)){
                        ?>     
                            <option value="<?php echo $especialidad["id"] ?>"> <?php echo $especialidad["nombre"]?></option>  

                        <?php    
                        }
                        ?>
                        </select>

                         <br>
                         <label>Seleccione Medico</label>
                         <select id="medico" name="medico">
                             <option value="">Ninguno</option>
                         </select>
                         <br>
                         <div id="diasAtencion"></div> <!--  Mensaje con dias de atencion-->
                         <label>Seleccione fecha turno</label>
                            <input id="fechaturno" type="text" name="fechaturno" autocomplete="off">
                         <br>
                         <label>Seleccione turno</label>
                         <select id="turno" name="turno">
                             <option value="">Ninguno</option>
                         </select>
                         <br>

                        <br><a id="botonCrear"class="btn btn-warning">Agregar Turno <i class="icon-plus icon-white"></i></a>
                        <a class="btn" href="listarTurnosSecretaria.php">Volver <i class="icon-arrow-left icon-white"></i></a>
                    </fieldset>
                </form>
            </div>
        </div>        <!--Fin Container-->
    </body>        
    
</html>