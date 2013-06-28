<?php 
$activo = "medico";
 
include '../conectar.php';
include "procesarSeguridad.php";
  if(isset($_GET["errorObra"])){
        $CampoObra = $_GET["errorObra"];
       
    }else{
        $CampoObra = "";
    }
    
 $idMedico=$_GET["id"];
?>

<!DOCTYPE html>

<html>
    <head> 
    
        
    <title>Agregar una nueva obra</title>
 
    <?php include "../modulos/head.php";
    
    ?>
       <link type="text/css" href="css/bootstrap.min.css" />
      
   
         
         <script>
    $(document).ready(function(){

        <?php
            if($CampoObra != "")
                echo "alert('Esta obra ya esta vinculada a este medico')";
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
                    <input id="id" name="id" type="hidden" value="<?php echo $idMedico?>">
                    <select id="obra" name="obra">   
                     <?php
                      $obrasMedico = "SELECT id AS idObra, nombre
                                      FROM obrasocial
                                      WHERE eliminado = false";
                      $obras = mysql_query($obrasMedico);
                      
                         while ($obrasResul = mysql_fetch_array($obras)) {
                    ?>
                        <option value="<?php echo $obrasResul["idObra"]; ?>" name="<?php echo $obrasResul["idObra"]; ?>"><?php echo $obrasResul['nombre']; ?> </option>
                    <?php } ?>
                  </select>
                     <br>
                    <button class="btn btn-warning" type="submit">Agregar <i class="icon-plus icon-white"></i></button>
                    <a class="btn" href="/SAT/paginas/medicos/obrasSociales.php?id=<?php echo $idMedico?>">
                    Cancelar
                    </a>
                
               </form>
          </fieldset> 
        
      </div>
    </div>
    </body>
</html>
