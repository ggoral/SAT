<?php
if (isset($_GET["errormatricula"])) {
    $matricula = $_GET["errormatricula"];
} else {
    $matricula = "";
}

include '../conectar.php';
$idpersona = $_GET['id'];
$sql = "Select medico.id, calle, especialidad.nombre AS nombreEsp, numero, telefono, email, persona.nombre AS nombreP, dni, apellido, provincia, matricula, localidad, especialidad.nombre AS nombreE, obrasocial.nombre AS obra FROM persona
        INNER JOIN medico ON ( medico.id = persona.id ) 
        INNER JOIN medicos_especialidades ON ( medico.id = medicos_especialidades.medico_id ) 
        INNER JOIN especialidad ON ( medicos_especialidades.especialidad_id = especialidad.id )
        INNER JOIN medicos_obrasociales ON (medicos_obrasociales.medico_id = medico.id)
        INNER JOIN obrasocial ON (medicos_obrasociales.obrasocial_id = obrasocial.id)
        WHERE persona.id = $idpersona and persona.eliminado = false";
$resultado = mysql_query($sql);
$dato = mysql_fetch_array($resultado);

if (!$dato) {
    header("location:listar.php");
}
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
                        
                        <input name="idpersona" type="hidden" value="<?php echo $dato['id'] ?>">
                        
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
                        <option value="">Seleccione Provincia</option>
                        <option value="CAPITAL FEDERAL" <?php if( $dato['provincia'] == 'CAPITAL FEDERAL' ){ echo 'selected'; } ?> >Capital Federal</option>
                        <option value="BUENOS AIRES" <?php if( $dato['provincia'] == 'BUENOS AIRES' ){ echo 'selected'; } ?> >Buenos Aires</option>
                        <option value="CATAMARCA" <?php if( $dato['provincia'] == 'CATAMARCA' ){ echo 'selected'; } ?>>Catamarca</option>
                        <option value="CORDOBA" <?php if( $dato['provincia'] == 'CORDOBA' ){ echo 'selected'; } ?>>Cordoba</option>
                        <option value="CORRIENTES" <?php if( $dato['provincia'] == 'CORRIENTES' ){ echo 'selected'; } ?>>Corrientes</option>
                        <option value="CHACO" <?php if( $dato['provincia'] == 'CHACO' ){ echo 'selected'; } ?>>Chaco</option>
                        <option value="CHUBUT" <?php if( $dato['provincia'] == 'CHUBUT' ){ echo 'selected'; } ?>>Chubut</option>
                        <option value="ENTRE RIOS" <?php if( $dato['provincia'] == 'ENTRE RIOS' ){ echo 'selected'; } ?>>Entre Rios</option>
                        <option value="FORMOSA" <?php if( $dato['provincia'] == 'FORMOSA' ){ echo 'selected'; } ?>>Formosa</option>
                        <option value="JUJUY" <?php if( $dato['provincia'] == 'JUJUY' ){ echo 'selected'; } ?>>Jujuy</option>
                        <option value="LA PAMPA" <?php if( $dato['provincia'] == 'LA PAMPA' ){ echo 'selected'; } ?>>La Pampa</option>
                        <option value="LA RIOJA" <?php if( $dato['provincia'] == 'LA RIOJA' ){ echo 'selected'; } ?>>La Rioja</option>
                        <option value="MENDOZA" <?php if( $dato['provincia'] == 'MENDOZA' ){ echo 'selected'; } ?>>Mendoza</option>
                        <option value="MISIONES" <?php if( $dato['provincia'] == 'MISIONES' ){ echo 'selected'; } ?>>Misiones</option>
                        <option value="NEUQUEN" <?php if( $dato['provincia'] == 'NEUQUEN' ){ echo 'selected'; } ?>>Neuquen</option>
                        <option value="RIO NEGRO" <?php if( $dato['provincia'] == 'RIO NEGRO' ){ echo 'selected'; } ?>>Rio Negro</option>
                        <option value="SALTA" <?php if( $dato['provincia'] == 'SALTA' ){ echo 'selected'; } ?>>Salta</option>
                        <option value="SAN JUAN" <?php if( $dato['provincia'] == 'SAN JUAN' ){ echo 'selected'; } ?>>San Juan</option>
                        <option value="SAN LUIS" <?php if( $dato['provincia'] == 'SAN LUIS' ){ echo 'selected'; } ?>>San Luis</option>
                        <option value="SANTA CRUZ" <?php if( $dato['provincia'] == 'SANTA CRUZ' ){ echo 'selected'; } ?>>Santa Cruz</option>
                        <option value="SANTA FE" <?php if( $dato['provincia'] == 'SANTA FE' ){ echo 'selected'; } ?>>Santa Fe</option>
                        <option value="TIERRA DEL FUEGO" <?php if( $dato['provincia'] == 'TIERRA DEL FUEGO' ){ echo 'selected'; } ?>>Tierra Del Fuego</option>
                        <option value="TUCUMAN" <?php if( $dato['provincia'] == 'TUCUMAN' ){ echo 'selected'; } ?>>Tucuman</option>
                        </select>
                            </div>
                        </div>
                        <br>
                    <div class="control_group">
                        <label class="control-label" for="Localidad">Localidad</label> 
                        <div class="controls">   
                            <input id="localidad" type="text" name="localidad" placeholder="Localidad" value='<?php echo $dato['localidad']; ?>' onKeyUp="this.value=this.value.toUpperCase();"><br>
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
                        ?>     
                            <option value="<?php echo $especialidad["id"] ?>" <?php if( $dato['nombreEsp'] == $especialidad['nombre'] ){ echo 'selected'; } ?>> <?php echo $especialidad["nombre"]?></option>  

                        <?php    
                        }
                        ?>
                        </select>
                        </div>
                         </div>
                        <br>  
                      
                      <div class="control_group">
                         <label class="control-label" for="Obra Social">Obra Social</label> 
                      <div class="controls">  
                      <select id="obra" name="obra">
                            <option value="">Seleccione Obra Social</option>
                        <?php 
                        $queryObra = "select * from obrasocial where eliminado=false";
                        $resObra = mysql_query($queryObra);
                        while($Obra = mysql_fetch_array($resObra)){
                        ?>     
                            <option value="<?php echo $Obra["id"] ?>" <?php if( $dato['obra'] == $Obra['nombre'] ){ echo 'selected'; } ?> > <?php echo $Obra["nombre"]?></option>  

                        <?php    
                        }
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
