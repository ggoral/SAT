<?php 
$activo = "medico";
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
    
    <script type="text/javascript" src="/SAT/js/medicoAlta.js"></script>
    
    <script>
    $(document).ready(function(){
        
        alert('algo');
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
                         <?php 
                        $queryPro = "select * from provincia";
                        $resPro = mysql_query($queryPro);
                        while($provincia = mysql_fetch_array($resPro)){
                        ?>     
                            <option value="<?php echo $provincia["id"] ?>"> <?php echo $provincia["nombre"]?></option>  

                        <?php    
                        }
                        ?>
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
                        ?>     
                            <option value="<?php echo $especialidad["id"] ?>"> <?php echo $especialidad["nombre"]?></option>  

                        <?php    
                        }
                        ?>
                        </select>
                    <br>             
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
