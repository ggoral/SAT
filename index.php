
<!DOCTYPE html>
<?php
include "procesarSeguridad.php";
?>


<html>
    <?php $activo = "turnos"?>
    <head>


    <title>SAT - ADMINISTRACION DE TURNOS </title>
    <?php include "paginas/modulos/head.php" ?>
       
    <style type="text/css"> 
        body { 
            background: url('img/background.png');
            background-repeat: repeat;
        } 

    </style> 
</head>

<body>
    <!--NavBar-->
<?php include "paginas/modulos/navBar.php"?>
    <!-- Fin NavBar-->     
    <div class="container" align="center">
        <div class="span3 offset4"> 
        </div>
        <div class="row">
            <br><br><br><br><br><br>
                <div class="span4 offset4 well">
                    <h3>Bienvenido al sistema</h3>
                    <p class="muted"><i>(Puede comenzar a navegar utilizando la barra superior)</i></p>
                </div>
        </div>
    </div>            
</body>
</html>
