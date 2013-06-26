<?php 
$activo = "paciente";
include '../conectar.php';
$idPaciente = $_GET['id'];
$query1 = "SELECT * FROM persona WHERE id = $idPaciente";
$result1 = mysql_query($query1);
?>
<!DOCTYPE html>
<html>
    <head>   
    <title>Modificar Paciente</title>
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
                <h3>Modificar Paciente</h3>   
         <?php while ($row = mysql_fetch_array($result1)){?>
               <form class="well" id="formularioAltaPaciente" action="procesarAltaPaciente.php" method="GET">
                    <input id="dni" type="text" name="dni" placeholder="DNI" autocomplete="off" value="<?php echo $row['dni']?>"><div id="mensajeDNI"></div>
                    <input id="nombre" type="text" name="nombre" placeholder="Nombre" onKeyUp="this.value=this.value.toUpperCase(); "autocomplete="off"value="<?php echo $row['nombre']?>">
                    <br>
                    <input id="apellido" type="text" name="apellido" placeholder="Apellido" onKeyUp="this.value=this.value.toUpperCase();"autocomplete="off" value="<?php echo $row['apellido']?>">
                    <br>
                    <select id="provincia" name="provincia">
                        <?php $query2 = "SELECT p.nombre
                                        FROM persona AS per
                                        INNER JOIN localidad AS l ON ( l.id = localidad_id ) 
                                        INNER JOIN provincia AS p ON ( l.provincia_id = p.id ) 
                                        WHERE per.id = $idPaciente;
                                        ";
                        $result2 = mysql_query($query2);
                        while($row2 = mysql_fetch_array($result2)){
                           ?> <option value="<?php echo $row2['nombre'];?>" selected>Original: <?php echo $row2['nombre'];?></option>
                        <?php }?>    
                        <?php include "../modulos/optionsProvincias.php"?>
                    </select>
                    <br>
                    <select id ="localidad" name='localidad'>
                        <?php $query3 = "SELECT l.nombre, l.id FROM localidad as l
                                         INNER JOIN persona as p ON (p.localidad_id = l.id)
                                         WHERE p.id = $idPaciente";
                              $result3 = mysql_query($query3);
                        while ($row3 = mysql_fetch_array($result3)){?><option value="<?php echo $row3['id'] ?>" selected>Original: <?php echo $row3['nombre'] ?></option> <?php }
                        ?>
                        
                    </select>
                    <br>
                    <input id="calle" type="text" name="calle" placeholder="Calle" onKeyUp="this.value=this.value.toUpperCase();"autocomplete="off" value="<?php echo $row['calle']?>"<br>
                    <br>
                    <input id="numero" type="text" name="numero" placeholder="Numero de casa"autocomplete="off" value="<?php echo $row['numero']?>"<br>
                    <br>
                    <input id="telefono" type="text" name="telefono" placeholder="Telefono"autocomplete="off"value="<?php echo $row['telefono']?>"<br>
                    <br>
                    <input id="email" type="text" name="email" placeholder="E-mail"autocomplete="off" value="<?php echo $row['email']?>"<br>            
                    <?php $query4 = "SELECT o.id, o.nombre FROM obrasocial as o
                                    INNER JOIN pacientes_obrasociales as po ON (po.obrasocial_id = o.id)
                                    WHERE po.paciente_id = $idPaciente";
                          $result4 = mysql_query($query4); //tengo todas las OS que tiene el paciente 
                    $numObra = 1;    
                          ?>
                    <?php while ($row4 = mysql_fetch_array($result4)){ ?>
                    <select id="obra<?php echo $numObra;?>" name="obra">
                        <option value="<?php echo $row4['nombre'] ?>" selected>Original: <?php echo $row4['nombre'] ?></option>   
                        <?php include "cargarOS.php";?>
                        </select><br>
                        <?php 
                        $numObra++;
                        }?>
                        <div id="nuevos"></div>
                        <a class='btn btn-mini btn-info' id="agregarOS">Agregar OS +</a><div id="masOS"></div>
                    <br>
                    <br>
                    <a href='#'id="botonGuardar"class="btn btn-warning" onClick="">Guardar <i class="icon-plus icon-white"></i></a>
                    <a class="btn" href="/SAT/paginas/pacientes/listar.php">
                    Cancelar
                    </a>
                    
         <?php } ?>
                </form>
          </fieldset> 
        
      </div>
    </div>
    </body>
</html>
