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
            <form action="procesarAltaTurno.php">
                <fieldset>
                    <label>DNI de paciente:</label>
                    <input id="dni" type="text" name="dni" ></input><div id="mensajePaciente"></div><!--  mensaje de error cuando no esta el paciente-->
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
                     <select id="medico">
                         <option value="">Ninguno</option>
                     </select>
                     
                    <br><button class="btn btn-warning">Agregar Turno <i class="icon-plus icon-white"></i></button>
                </fieldset>
            </form>
        </div>        <!--Fin Container-->
    </body>        
    <footer>   
    </footer>
    
    
    <script type="text/javascript">
        $(document).ready(
        function(){
            $("#dni").blur( function(){
               $("#mensajePaciente").load("procesarAltaTurno.php" + '?dni=' + $("#dni").val());
            });
        

        }
        );
        

        $("#especialidad").change(function(){
        var data = "especialidad=" + $("#especialidad").val();
        
        $.ajax({
        type: "POST",
        url: "procesarEspecialidad.php",
        async: false,
        data:data,
        success: function(html){ 
            $("#medico").empty();
            $("#medico").append(html);
            }
        });
        
        });
    </script>
   
</html>