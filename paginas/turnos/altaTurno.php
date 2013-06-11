<?php include "../conectar.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "../modulos/head.php" ?>  
    <script type="text/javascript" src="/SAT/js/turnosAlta.js"></script>
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
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
                    <div class="container">
                        <a href="/SAT/index.php" class="brand">SAT - Sistema de Administración de Turnos</a>
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
            <div class="offset4 span3">
                <h3 align="center">NUEVO TURNO</h3>
                <form class ="well" id ="formAltaTurno" action="crearTurno.php" method="post">
                    <fieldset>
                        <label>DNI de paciente:</label>
                        <input id="dni" type="text" name="dni" autocomplete="off"></input><div id="mensajePaciente"></div><!--  mensaje de error cuando no esta el paciente-->
                        <label>Seleccione Obra Social:</label> 
                        <select id="obraSocial" name="obraSocial">
                            <option value="">Seleccione obra social</option>
                        </select>
                        
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
    <footer class="footer">
    </footer>
    
</html>