<?php
include "procesarSeguridad.php";
?>

<?php
if (isset($_GET["errornombre"])) {
    $nombre = $_GET["errornombre"];
} else {
    $nombre = "";
}

include '../conectar.php';
$idEspecialidad = $_GET['id'];
$sql = "Select * from especialidad where id = $idEspecialidad and eliminado = false";
$resultado = mysql_query($sql);
$dato = mysql_fetch_array($resultado);

if (!$dato) {
    header("location:listar.php");
}
?>
<?php $activo = "especialidad"?>
<!DOCTYPE html>
<html>
    <head>


    <title>Modificar Especialidad</title>
    <?php include "../modulos/head.php" ?>
        
    <script> 
        $(document).ready(function(){
        <?php
            if($nombre != "")
                echo "alert('Esta especialidad ya existe')";
        ?>          
    });
    </script>    
    </style> 
</head>

<body>
    <!--NavBar-->
    <?php include "../modulos/navBar.php" ?>
    <!-- Fin NavBar-->     
    <div class="container" align="center">
        <div class="span3 offset4"> 
            <fieldset>
                <br>
                <h3>Modificar Obra Social</h3>   
                <form class="well" id="formulario" action="procesarModificarEspecialidad.php" method="GET" onsubmit="return validarModificacionOS()">
                    <input id="nombre" type="text" placeholder="Nuevo nombre" name="nombre" value='<?php if($nombre != "") { echo $nombre; }else{echo $dato['nombre']; }?>' onKeyUp="this.value = this.value.toUpperCase();" ><br>  
                    <input name="idEspecialidad" type="hidden" value="<?php echo $dato['id'] ?>">
                    <br>
                    <button class="btn btn-success" type="submit">Modificar <i class="icon-ok icon-white"></i></button>
                    <a class="btn" href="/SAT/paginas/Especialidad/listar.php">
                        Cancelar
                    </a>
                </form>
            </fieldset>     
        </div>
    </div>            
</body>
</html>
