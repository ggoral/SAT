<?php 
$activo = "medico";
    if(isset($_GET["errormatricula"])){
        $Campomatricula = $_GET["errormatricula"];
    }else{
        $Campomatricula = "";
    }

include '../conectar.php';include "procesarSeguridad.php";
?>

<!DOCTYPE html>

<html>
    <head>   
    <title>Medicos</title>
 
    <?php include "../modulos/head.php" ?>
    
    <script type="text/javascript" src="/SAT/js/medicoAlta.js"></script>
    <script type="text/javascript" src="/SAT/js/validacionesGenericas.js"></script>
    
    <script>
    $(document).ready(function(){

        <?php
            if($Campomatricula != "")
                echo "alert('Esta matricula ya existe')";
        ?>      
    });
    </script>
    
    <style type="text/css"> 
    body { 
    background: url('../../img/background.png');
    background-repeat: repeat;
    } 
    
    </style> 
  </head>
   

    <body>
        <!--NavBar-->
     <?php include "../modulos/navBar.php" ?>
      <!-- Fin NavBar-->

      <div class="container" align="center">
      <div class="span4 offset4"> 
          <fieldset>
                <br>
                <h3>Alta de Medico</h3>   
               <form class="well" id="formulario" action="procesarAltaMedico.php" method="GET" onsubmit="return validarAltaMedico()" >
                    <input id="matricula" type="text" name="matricula" placeholder="Matricula">
                    <br>
                    <input id="nombre" type="text" name="nombre" placeholder="Nombre" onKeyUp="this.value=this.value.toUpperCase();">
                    <br>
                    <input id="apellido" type="text" name="apellido" placeholder="Apellido" onKeyUp="this.value=this.value.toUpperCase();">
                    <br>
                    <input id="dni" type="text" name="dni" placeholder="DNI">
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
                    <select id="localidad" name="localidad" >
                        <option value="">Seleccione Localidad</option>
                    </select>
                    <br>
                    <input id="calle" type="text" name="calle" placeholder="Calle" onKeyUp="this.value=this.value.toUpperCase();"<br>
                    <br>
                    <input id="numero" type="text" name="numero" placeholder="Numero de casa"<br>
                    <br>
                    <input id="telefono" type="text" name="telefono" placeholder="Telefono"<br>
                    <br>
                    <input id="email" type="text" name="email" placeholder="E-mail" <br>
                    <br>                                
                         <select id="especialidad" name="especialidad">
                            <option value="">Seleccione Especialidad</option>
                        <?php 
                        $queryEsp = "select * from especialidad";
                        $resEsp = mysql_query($queryEsp);
                        while($especialidad = mysql_fetch_array($resEsp)){
                        if($especialidad['habilitada']== 1){?>    
                            <option value="<?php echo $especialidad["id"] ?>"> <?php echo $especialidad["nombre"]?></option>  

                        <?php    
                        }}
                        ?>
                        </select>         
                 
                    <br>
                    <button class="btn btn-warning" type="submit">Agregar <i class="icon-plus icon-white"></i></button>
                    <a class="btn" href="/SAT/paginas/medicos/listar.php">
                    Cancelar
                    </a>
                </form>
          </fieldset> 
        
      </div>
    </div>
    </body>
</html>
