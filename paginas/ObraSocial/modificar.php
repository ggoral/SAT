<?php
if (isset($_GET["errornombre"])) {
    $nombre = $_GET["errornombre"];
} else {
    $nombre = "";
}

include '../conectar.php';
$idOS = $_GET['id'];
$sql = "Select * from obrasocial where id = $idOS and eliminado = false";
$resultado = mysql_query($sql);
$dato = mysql_fetch_array($resultado);

if (!$dato) {
    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html>
    <head>


    <title>Modificar Obra Social</title>
    <?php include "../modulos/head.php" ?>
        
    <script> 
        $(document).ready(function(){
        
        
        <?php
            if($nombre != "")
                echo "alert('Esta obra social ya existe')";
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
    <div class="navbar navbar-static-top">
        <div class="navbar-inner">
            <div class="container">
                <a href="#" class="brand">SAT - Sistema de Administración de Turnos</a>
                <div class="nav-collapse collapse">
                    <ul class="nav pull-right"><li class="divider-vertical"></li>
                        <li><a href="/SAT/paginas/turnos/listarTurnosSecretaria.php">Turnos</a></li><li class="divider-vertical"></li>
                        <li><a href="#">Pacientes</a></li><li class="divider-vertical"></li>
                        <li class="active"><a href="/SAT/paginas/ObraSocial/listar.php">Obras Sociales</a></li><li class="divider-vertical"></li>
                        <li><a href="#">Especialidades</a></li><li class="divider-vertical"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin NavBar-->     
    <div class="container" align="center">
        <div class="span3 offset4"> 
            <fieldset>
                <br>
                <h3>Modificar Obra Social</h3>   
                <form class="well" id="formulario" action="procesarModifcarOS.php" method="GET" onsubmit="return validarModificacionOS()">
                    <input id="nombre" type="text" placeholder="Nuevo nombre" name="nombre" value='<?php if($nombre != "") { echo $nombre; }else{echo $dato['nombre']; }?>' onKeyUp="this.value = this.value.toUpperCase();" ><br>  
                    <input name="idOS" type="hidden" value="<?php echo $dato['id'] ?>">
                    <br>
                    <button class="btn btn-success" type="submit">Modificar <i class="icon-ok icon-white"></i></button>
                    <a class="btn" href="/SAT/paginas/ObraSocial/listar.php">
                        Cancelar
                    </a>
                </form>
            </fieldset>     
        </div>
    </div>            
</body>
</html>
