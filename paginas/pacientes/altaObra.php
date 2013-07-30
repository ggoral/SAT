<?php 
$activo = "paciente";
include '../conectar.php';include "procesarSeguridad.php";
$idPaciente=$_GET["id"];
if(isset($_GET["errorObra"])){
    $CampoObra = $_GET["errorObra"];   
}else{
    $CampoObra = "";
}
?>
<!DOCTYPE html>
<html>
    <head>    
    <title>Agregar una nueva obra</title>
    <?php include "../modulos/head.php"?>
    <link type="text/css" href="css/bootstrap.min.css" />
    <script>
    $(document).ready(function(){
        <?php
        if($CampoObra != "")
            echo "alert('Esta obra ya esta vinculada a este paciente')";
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
                <h3>Alta de Obra</h3>   
                 <form class="well" id="formulario" action="procesarAltaObra.php" method="GET" onsubmit="return validarAltaObra();">                 
                    <input id="id" name="id" type="hidden" value="<?php echo $idPaciente?>">
                    <select id="obra" name="obra">   
                     <?php
                      $query = "SELECT id AS idObra, nombre
                                      FROM obrasocial
                                      WHERE eliminado = false";
                      $result = mysql_query($query);
                      
                         while ($row = mysql_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $row["idObra"]; ?>" name="<?php echo $row["idObra"]; ?>"><?php echo $row['nombre']; ?> </option>
                    <?php } ?>
                  </select>
                     <br>
                    <button class="btn btn-warning" type="submit">Agregar <i class="icon-plus icon-white"></i></button>
                    <a class="btn" href="/SAT/paginas/pacientes/obrasSociales.php?id=<?php echo $idPaciente?>">
                    Cancelar
                    </a>
                
               </form>
          </fieldset> 
        
      </div>
    </div>
    </body>
</html>
