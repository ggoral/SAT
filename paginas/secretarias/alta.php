<?php 
$activo = "paciente";
include '../conectar.php';include "procesarSeguridad.php";
?>
<!DOCTYPE html>
<html>
    <head>   
    <title>Nueva Secretaria</title>
    <?php include "../modulos/head.php" ?>
    <style type="text/css"> 
    body { 
    background: url('../../img/background.png');
    background-repeat: repeat;
    } 
</style>
<script type="text/javascript" src="/SAT/js/pacientes.js"></script>
<script type="text/javascript" src="/SAT/js/validacionesGenericas.js"></script>
  </head>
  
    <body>
        <!--NavBar-->
     <?php include "../modulos/navBar.php" ?>
      <!-- Fin NavBar-->

      <div class="container" align="center">
      <div class="span4 offset4"> 
          <fieldset>
                <br>
                <h3>Alta de Secretaria</h3>   
               <form class="well" id="formularioAltaPaciente" action="procesarAltaSecretaria.php" method="GET">
                    <input id="dni" type="text" name="dni" placeholder="DNI" autocomplete="off"><div id="mensajeDNI"></div>
                    <input id="nombre" type="text" name="nombre" placeholder="Nombre" onKeyUp="this.value=this.value.toUpperCase(); "autocomplete="off">
                    <br>
                    <input id="apellido" type="text" name="apellido" placeholder="Apellido" onKeyUp="this.value=this.value.toUpperCase();"autocomplete="off">
                    <br>
                    <select id="provincia" name="provincia">
                        <?php include "../modulos/optionsProvincias.php"?>
                    </select>
                    <br>
                    <select id ="localidad" name='localidad'>
                        <option value="">Seleccionar localidad</option>
                    </select>
                    <br>
                    <input id="calle" type="text" name="calle" placeholder="Calle" onKeyUp="this.value=this.value.toUpperCase();"autocomplete="off"<br>
                    <br>
                    <input id="numero" type="text" name="numero" placeholder="Numero de casa"autocomplete="off"<br>
                    <br>
                    <input id="telefono" type="text" name="telefono" placeholder="Telefono"autocomplete="off"<br>
                    <br>
                    <input id="email" type="email" name="email" placeholder="E-mail"autocomplete="off" <br>            
                    <br>
                    <br>
                    <button id="botonCrear"class="btn btn-warning" type="submit">Agregar <i class="icon-plus icon-white"></i></button>
                    <a class="btn" href="/SAT/paginas/secretarias/listar.php">
                    Cancelar
                    </a>
                </form>
          </fieldset> 
        
      </div>
    </div>
    </body>
</html>