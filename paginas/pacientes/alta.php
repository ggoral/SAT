<?php 
$activo = "paciente";
include '../conectar.php';
?>
<!DOCTYPE html>
<html>
    <head>   
    <title>Nuevo Paciente</title>
    <?php include "../modulos/head.php" ?>
    <style type="text/css"> 
    body { 
    background: url('../../img/background.png');
    background-repeat: repeat;
    } 
</style>
<script type="text/javascript" src="/SAT/js/pacientes.js"></script>
  </head>
  
    <body>
        <!--NavBar-->
     <?php include "../modulos/navBar.php" ?>
      <!-- Fin NavBar-->

      <div class="container" align="center">
      <div class="span4 offset4"> 
          <fieldset>
                <br>
                <h3>Alta de Paciente</h3>   
               <form class="well" id="formularioAltaPaciente" action="procesarAltaPaciente.php" method="GET">
                    <input id="dni" type="text" name="dni" placeholder="DNI" autocomplete="off"><div id="mensajeDNI"></div>
                    <input id="nombre" type="text" name="nombre" placeholder="Nombre" onKeyUp="this.value=this.value.toUpperCase(); "autocomplete="off">
                    <br>
                    <input id="apellido" type="text" name="apellido" placeholder="Apellido" onKeyUp="this.value=this.value.toUpperCase();"autocomplete="off">
                    <br>
                    <select id="provincia" name="provincia">
                        <option value="">Seleccione Provincia</option>
                        <option value="CAPITAL FEDERAL">Capital Federal</option>
                        <option value="BUENOS AIRES">Buenos Aires</option>
                        <option value="CATAMARCA">Catamarca</option>
                        <option value="CORDOBA">Cordoba</option>
                        <option value="CORRIENTES">Corrientes</option>
                        <option value="CHACO">Chaco</option>
                        <option value="CHUBUT">Chubut</option>
                        <option value="ENTRE RIOS">Entre Rios</option>
                        <option value="FORMOSA">Formosa</option>
                        <option value="JUJUY">Jujuy</option>
                        <option value="LA PAMPA">La Pampa</option>
                        <option value="LA RIOJA">La Rioja</option>
                        <option value="MENDOZA">Mendoza</option>
                        <option value="MISIONES">Misiones</option>
                        <option value="NEUQUEN">Neuquen</option>
                        <option value="RIO NEGRO">Rio Negro</option>
                        <option value="SALTA">Salta</option>
                        <option value="SAN JUAN">San Juan</option>
                        <option value="SAN LUIS">San Luis</option>
                        <option value="SANTA CRUZ">Santa Cruz</option>
                        <option value="SANTA FE">Santa Fe</option>
                        <option value="TIERRA DEL FUEGO">Tierra Del Fuego</option>
                        <option value="TUCUMAN">Tucuman</option>
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
                    <input id="email" type="text" name="email" placeholder="E-mail"autocomplete="off" <br>            
                      <select id="obra" name="obra">
                            <option value="">Seleccione Obra Social</option>
                        <?php 
                        $queryObra = "select * from obrasocial where eliminado=false";
                        $resObra = mysql_query($queryObra);
                        while($Obra = mysql_fetch_array($resObra)){
                        ?>     
                            <option value="<?php echo $Obra["id"] ?>"> <?php echo $Obra["nombre"]?></option>  

                        <?php    
                        }
                        ?>
                        </select>
                    <br>
                    <br>
                    <a href='#'id="botonCrear"class="btn btn-warning">Agregar <i class="icon-plus icon-white"></i></a>
                    <a class="btn" href="/SAT/paginas/medicos/listar.php">
                    Cancelar
                    </a>
                </form>
          </fieldset> 
        
      </div>
    </div>
    </body>
</html>

