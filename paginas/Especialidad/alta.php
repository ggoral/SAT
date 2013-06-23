<?php 
    if(isset($_GET["errornombre"])){
        $nombre = $_GET["errornombre"];
    }else{
        $nombre = "";
    }
?>
<?php $activo = "especialidad"?>
<!DOCTYPE html>
<html>
    <head>
    <title>Obras Sociales</title>
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
                <h3>Alta de Especialidad</h3>   
                <form class="well" id="formulario" action="procesarAltaEspecialidad.php" method="GET" onsubmit="return validarAltaOS()" >
                    <input id="nombre" type="text" name="nombre" placeholder="Nombre"  onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $nombre ?>"><br>
                    <br>
                    <button class="btn btn-warning" type="submit">Agregar <i class="icon-plus icon-white"></i></button>
                    <a class="btn" href="/SAT/paginas/Especialidad/listar.php">
                    Cancelar
                    </a>
                </form>
          </fieldset> 
        
      </div>
    </div>
    </body>
</html>
