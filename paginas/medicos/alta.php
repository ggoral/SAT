<?php 
    if(isset($_GET["errormatricula"])){
        $Campomatricula = $_GET["errormatricula"];
    }else{
        $Campomatricula = "";
    }

include '../conectar.php';
?>

<!DOCTYPE html>

<html>
    <head>   
    <title>Medicos</title>
 
    <?php include "../modulos/head.php" ?>

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
                    <input id="nombre" type="text" name="nombre" placeholder="Nombre">
                    <br>
                    <input id="apellido" type="text" name="apellido" placeholder="Apellido">
                    <br>
                    <input id="dni" type="text" name="dni" placeholder="DNI">
                    <br>              
                    <select id="provincia" name="provincia">
                        <option value="">Seleccione Provincia</option>
                        <option value="Capital Federal">Capital Federal</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Catamarca">Catamarca</option>
                        <option value="Cordoba">Cordoba</option>
                        <option value="Corrientes">Corrientes</option>
                        <option value="Chaco">Chaco</option>
                        <option value="Chubut">Chubut</option>
                        <option value="Entre Ríos">Entre Ríos</option>
                        <option value="Formosa">Formosa</option>
                        <option value="Jujuy">Jujuy</option>
                        <option value="La Pampa">La Pampa</option>
                        <option value="La Rioja">La Rioja</option>
                        <option value="Mendoza">Mendoza</option>
                        <option value="Misiones">Misiones</option>
                        <option value="Neuquen">Neuquén</option>
                        <option value="Rio Negro">Río Negro</option>
                        <option value="Salta">Salta</option>
                        <option value="San Juan">San Juan</option>
                        <option value="San Luis">San Luis</option>
                        <option value="Santa Cruz">Santa Cruz</option>
                        <option value="Santa Fe">Santa Fe</option>
                        <option value="Tierra del Fuego">Tierra del Fuego</option>
                        <option value="Tucuman">Tucumán</option>
                    </select>
                    <br>
                    <input id="localidad" type="text" name="localidad" placeholder="Localidad"<br>
                    <br>
                    <input id="calle" type="text" name="calle" placeholder="Calle"<br>
                    <br>
                    <input id="numero" type="text" name="numero" placeholder="Numero de casa"<br>
                    <br>
                    <input id="telefono" type="text" name="telefono" placeholder="Telefono"<br>
                    <br>
                    <input id="email" type="text" name="email" placeholder="E-mail"<br>
                    <br>                                
                         <select id="especialidad" name="especialidad">
                            <option value="">Seleccione Especialidad</option>
                        <?php 
                        $queryEsp = "select * from especialidad";
                        $resEsp = mysql_query($queryEsp);
                        while($especialidad = mysql_fetch_array($resEsp)){
                        ?>     
                            <option value="<?php echo $especialidad["id"] ?>"> <?php echo $especialidad["nombre"]?></option>  

                        <?php    
                        }
                        ?>
                        </select>
                    <br>
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
