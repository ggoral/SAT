<?php 
$activo = "medico";
 
include '../conectar.php';

  if(isset($_GET["errordia"])){
        $Campodia = $_GET["errordia"];
       
    }else{
        $Campodia = "";
    }
    
 $idMedico=$_GET["id"];
?>

<!DOCTYPE html>

<html>
    <head> 
    
        
    <title>Agregar un nuevo dia</title>
 
    <?php include "../modulos/head.php";
    
    ?>
       <link type="text/css" href="css/bootstrap.min.css" />
        <link type="text/css" href="css/bootstrap-timepicker.min.css" />
        <script type="text/javascript" src="/SAT/js/medicoAlta.js"></script>
        <script type="text/javascript" src="/SAT/js/bootstrap-timepicker.js"></script>
        <script type="text/javascript" src="/SAT/js/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="/SAT/js/bootstrap-modal.js"></script>
        <script type="text/javascript" src="/SAT/js/bootstrap.js"></script>
   
         
         <script>
    $(document).ready(function(){

        <?php
            if($Campodia != "")
                echo "alert('Esta dia ya tiene su horario, modifiquelo desde el listado')";
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
                <h3>Alta de Dia</h3>   
                 <form class="well" id="formulario" action="procesarAltaDia.php" method="GET" onsubmit="return validarAltaDia();">                 
                    <input id="id" name="id" type="hidden" value="<?php echo $idMedico?>">
                    <select id="dia" name="dia">   
            
                        <option value="">Seleccione Dia</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miercoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sabado">Sabado</option>  
                  </select>
                    <br>
        
                    <label>Selecione horario de inicio:</label>
                          <select id="horaDesde" name="horaDesde">   
                                <?php
                                $hora=0;
                                $minuto=0;
                                $segundo=0;
                                while($hora !=25){
                                    
                                        if($hora <= 9){
                                    ?> 
                                        <option value='<?php echo '0'.$hora.':0'.$minuto.':0'.$segundo?>'><?php echo '0'.$hora.':0'.$minuto.':0'.$segundo?></option>
                                        <?php
                                        $minuto=30;
                                        ?>
                                        <option value='<?php echo '0'.$hora.':0'.$minuto.':0'.$segundo?>'><?php echo '0'.$hora.':'.$minuto.':0'.$segundo?></option>
                                        <?php
                                        $minuto=0;
                                        $hora=$hora+1;
                                        }  else {
                                            ?>
                                            <option value='<?php echo $hora.':0'.$minuto.':0'.$segundo?>'><?php echo $hora.':0'.$minuto.':0'.$segundo?></option>
                                        <?php
                                        $minuto=30;
                                        ?>
                                        <option value='<?php echo $hora.':0'.$minuto.':0'.$segundo?>'><?php echo $hora.':'.$minuto.':0'.$segundo?></option>
                                        <?php
                                        $minuto=0;
                                        $hora=$hora+1;
                                            
                                        }
                                }
                                ?>
                  </select>
                         <br>
                
                    <label>Selecione horario de fin:</label>
                    
                     <select id="horaHasta" name="horaHasta">   
                                <?php
                                $hora=0;
                                $minuto=0;
                                $segundo=0;
                                while($hora !=25){
                                    
                                        if($hora <= 9){
                                    ?> 
                                        <option value='<?php echo '0'.$hora.':0'.$minuto.':0'.$segundo?>'><?php echo '0'.$hora.':0'.$minuto.':0'.$segundo?></option>
                                        <?php
                                        $minuto=30;
                                        ?>
                                        <option value='<?php echo '0'.$hora.':0'.$minuto.':0'.$segundo?>'><?php echo '0'.$hora.':'.$minuto.':0'.$segundo?></option>
                                        <?php
                                        $minuto=0;
                                        $hora=$hora+1;
                                        }  else {
                                            ?>
                                            <option value='<?php echo $hora.':0'.$minuto.':0'.$segundo?>'><?php echo $hora.':0'.$minuto.':0'.$segundo?></option>
                                        <?php
                                        $minuto=30;
                                        ?>
                                        <option value='<?php echo $hora.':0'.$minuto.':0'.$segundo?>'><?php echo $hora.':'.$minuto.':0'.$segundo?></option>
                                        <?php
                                        $minuto=0;
                                        $hora=$hora+1;
                                            
                                        }
                                }
                                ?>
                  </select>
                    <br>
                     <br>
                    <button class="btn btn-warning" type="submit">Agregar <i class="icon-plus icon-white"></i></button>
                    <a class="btn" href="/SAT/paginas/medicos/diasAtencion.php?id=<?php echo $idMedico?>">
                    Cancelar
                    </a>
                
               </form>
          </fieldset> 
        
      </div>
    </div>
    </body>
</html>
