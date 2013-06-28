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
            <div class="span4 offset3"> 
                <fieldset>
                    <h3>Modificar Paciente</h3>
                    <?php while ($row = mysql_fetch_array($result1)){?>
                    <form class="form-horizontal" id="formularioEditarPaciente" action="procesarEditarPaciente.php" method="GET">
                        <div class="control-group">
                            <label class="control-label" for="dni">DNI:</label>
                            <div class="controls">
                            <input id="dni" type="text" name="dni" placeholder="DNI" autocomplete="off" value="<?php echo $row['dni']?>"><div id="mensajeDNI"></div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nombre">Nombre:</label>
                            <div class="controls">
                            <input id="nombre" type="text" name="nombre" placeholder="Nombre" onKeyUp="this.value=this.value.toUpperCase(); "autocomplete="off"value="<?php echo $row['nombre']?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="apellido">Apellido:</label>
                            <div class="controls">
                            <input id="apellido" type="text" name="apellido" placeholder="Apellido" onKeyUp="this.value=this.value.toUpperCase();"autocomplete="off" value="<?php echo $row['apellido']?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="provincia">Provincia:</label>
                            <div class="controls">
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
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="localidad">Localidad:</label>
                            <div class="controls">
                            <select id ="localidad" name='localidad'>
                            <?php $query3 = "SELECT l.nombre, l.id FROM localidad as l
                                             INNER JOIN persona as p ON (p.localidad_id = l.id)
                                             WHERE p.id = $idPaciente";
                                  $result3 = mysql_query($query3);
                            while ($row3 = mysql_fetch_array($result3)){?><option value="<?php echo $row3['id'] ?>" selected>Original: <?php echo $row3['nombre'] ?></option> <?php }
                            ?>     
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="calle">Calle:</label>
                            <div class="controls">
                            <input id="calle" type="text" name="calle" placeholder="Calle" onKeyUp="this.value=this.value.toUpperCase();"autocomplete="off" value="<?php echo $row['calle']?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="numero">Numero:</label>
                            <div class="controls">
                            <input id="numero" type="text" name="numero" placeholder="Numero de casa"autocomplete="off" value="<?php echo $row['numero']?>">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="telefono">Telefono:</label>
                            <div class="controls">
                            <input id="telefono" type="text" name="telefono" placeholder="Telefono"autocomplete="off"value="<?php echo $row['telefono']?>">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="email">E-Mail:</label>
                            <div class="controls">
                            <input id="email" type="text" name="email" placeholder="E-mail"autocomplete="off" value="<?php echo $row['email']?>">
                            </div>
                        </div>
                        
                        <br>
                        <a class="btn btn-info btn-mini" href="obrasSociales.php?id=<?php echo $idPaciente;?>">Editar Obras sociales<i class="icon-plus icon-white"></i></a>
                        <br><br>
                        <a href='#'id="botonGuardar"class="btn btn-warning" onClick="">Guardar <i class="icon-plus icon-white"></i></a>
                        <a class="btn" href="/SAT/paginas/pacientes/listar.php">Cancelar</a>
                    <?php } ?>    
                    </form>
                </fieldset>      
            </div>
        </div>
    </body>
</html>
