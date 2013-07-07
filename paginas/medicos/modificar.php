<?php
if (isset($_GET["errormatricula"])) {
    $matricula = $_GET["errormatricula"];
} else {
    $matricula = "";
}
$activo = "medico";
include '../conectar.php';
include "procesarSeguridad.php";
$idpersona = $_GET['id'];
$sql = "Select medico.id, calle, especialidad.nombre AS nombreEsp, numero, telefono, email, persona.nombre AS nombreP, dni, apellido, provincia.nombre as provincia, matricula, localidad.id as localidad, especialidad.nombre AS nombreE FROM persona
        INNER JOIN medico ON ( medico.id = persona.id ) 
        INNER JOIN medicos_especialidades ON ( medico.id = medicos_especialidades.medico_id ) 
        INNER JOIN especialidad ON ( medicos_especialidades.especialidad_id = especialidad.id )     
        INNER JOIN localidad ON (persona.localidad_id = localidad.id)
        INNER JOIN provincia ON (localidad.provincia_id = provincia.id)
        WHERE persona.id = $idpersona and persona.eliminado = false";
$resultado = mysql_query($sql);
$dato = mysql_fetch_array($resultado);

if (!$dato) {
   header("location:listar.php");
}
$idPaciente = $_GET['id'];
?>
<!DOCTYPE html>
<html>
    <head>


    <title>Modificar Medico</title>
    <?php include "../modulos/head.php" ?>
        
    <script> 
        $(document).ready(function(){
        
        
        <?php
            if($matricula != "")
                echo "alert('Este medico ya existe')";
        ?>
                
    });
    </script>    
          
    <style type="text/css"> 
        body { 
            background: url('../../img/background.png');
            background-repeat: repeat;
        } 

    </style>
        <script type="text/javascript" src="/SAT/js/medicoAlta.js"></script>
        <script type="text/javascript" src="/SAT/js/validacionesGenericas.js"></script>
    </head>

<body>
       
 <!--NavBar-->
     <?php include "../modulos/navBar.php" ?>
      <!-- Fin NavBar-->
      
    <div class="container" align="center">
        <div class="span4 offset3">
            
            <fieldset>
                <br>
                <h3>Modificar Medico</h3>   
                <form class="form-horizontal" id="formulario" action="procesarModificarMedico.php" method="GET" onsubmit="return validarAltaMedico()" >
                        <div class="control_group">
                            <label class="control-label" for="Matricula">Matricula</label> 
                            <div class="controls">
                            <input id="matricula" type="text" name="matricula" placeholder="Matricula" value='<?php if($matricula != "") { echo $matricula; }else{echo $dato['matricula']; }?>'>
                            </div> 
                        </div>
                        <br>
                        
                        <input name="idpersona" type="hidden" value="<?php echo $idpersona ?>">
                        
                        <div class="control_group">
                            <label class="control-label" for="Nombre">Nombre</label> 
                            <div class="controls">
                            <input id="nombre" type="text" name="nombre" placeholder="Nombre" value='<?php echo $dato['nombreP'];?>' onKeyUp="this.value=this.value.toUpperCase();">
                            </div>
                        </div>
                        <br>
                     
                        <div class="control_group">
                            <label class="control-label" for="Apellido">Apellido</label> 
                            <div class="controls">    
                            <input id="apellido" type="text" name="apellido" placeholder="Apellido" value='<?php echo $dato['apellido']; ?>' onKeyUp="this.value=this.value.toUpperCase();">
                            </div>
                        </div>
                        <br>
                        
                        <div class="control_group">
                            <label class="control-label" for="DNI">DNI</label> 
                            <div class="controls">  
                            <input id="dni" type="text" name="dni" placeholder="DNI" value='<?php echo $dato['dni']; ?>' >
                            </div>
                        </div>
                        <br>
                        
                        <div class="control_group">
                            <label class="control-label" for="Provincia">Provincia</label> 
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
                        <br>
                    <div class="control_group">
                        <label class="control-label" for="Localidad">Localidad</label> 
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
                        <br>
                        
                     <div class="control_group">
                        <label class="control-label" for="Calle">Calle</label> 
                        <div class="controls">      
                    <input id="calle" type="text" name="calle" placeholder="Calle" value='<?php echo $dato['calle']; ?>' onKeyUp="this.value=this.value.toUpperCase();"><br>
                      </div>
                        </div>
                        <br>
                    
                     <div class="control_group">
                        <label class="control-label" for="Numero">Numero</label> 
                        <div class="controls">  
                    <input id="numero" type="text" name="numero" value='<?php echo $dato['numero']; ?>' placeholder="Numero de casa"><br>
                      </div>
                        </div>
                        <br>
                    
                     <div class="control_group">
                        <label class="control-label" for="Telefono">Telefono</label> 
                        <div class="controls">  
                    <input id="telefono" type="text" name="telefono" placeholder="Telefono" value='<?php echo $dato['telefono']; ?>'><br>
                     </div>
                        </div>
                        <br>
                    
                     <div class="control_group">
                        <label class="control-label" for="E-mail">E-mail</label> 
                        <div class="controls">  
                    <input id="email" type="text" name="email" placeholder="E-mail" value='<?php echo $dato['email']; ?>'> <br>
                      </div>
                        </div>
                        <br>  
                    
                     <div class="control_group">
                        <label class="control-label" for="Especialidad">Especialidad</label> 
                        <div class="controls">
                         <select id="especialidad" name="especialidad">
                            <option value="">Seleccione Especialidad</option>
                        <?php 
                        $queryEsp = "select * from especialidad";
                        $resEsp = mysql_query($queryEsp);
                        while($especialidad = mysql_fetch_array($resEsp)){
                        if($especialidad['habilitada']== 1){?>      
                            <option value="<?php echo $especialidad["id"] ?>" <?php if( $dato['nombreEsp'] == $especialidad['nombre'] ){ echo 'selected'; } ?>> <?php echo $especialidad["nombre"]?></option>  

                        <?php    
                        }}
                        ?>
                        </select>
                        </div>
                         </div>
                        <br>  
                      
                    
                
                      
                    <br>
                    <button class="btn btn-warning" type="submit">Modificar <i class="icon-plus icon-white"></i></button>
                    <a class="btn" href="/SAT/paginas/medicos/listar.php">
                    Cancelar
                    </a>
                </form>
            </fieldset>     
        </div>
    </div>            
</body>
</html>
