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
            <h3>CREAR TURNO</h3>
            <form>
                <fieldset>
                    <label>DNI de paciente:</label>
                    <input type="text" name="dni"></input><div id="mensajeErrorPaciente"></div><!--  mensaje de error cuando no esta el paciente-->
                     <label>Nombre del médico:</label>
                    <input type="text" name="medico" onFocus="verificarPaciente();"></input>
                    <br><a class="btn btn-warning">Agregar Turno <i class="icon-plus icon-white"></i></a>
                </fieldset>
            </form>
        </div>        <!--Fin Container-->
    </body>        
    <footer>   
</footer>
<?php include 'modalNuevoTurno.php';?><!-- Ventana para agregar OCULTA -->
<script>
    function verificarPaciente(){
        $('#mensajeErrorPaciente').load('procesarAltaTurno.php');
    }
</script>
</html>