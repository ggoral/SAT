<?php

include '../conectar.php';
$idTipo = $_GET['id'];
$sql = "Select * from Tipos where idTipo = $idTipo";
$resultado = mysql_query($sql);
$dato = mysql_fetch_array($resultado);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Modificar Tipo</title>
        <link rel="stylesheet" href="../../librerias/bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="../../css/miestilo.css" type="text/css" />
        <script src="../../javascript/misScripts.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="contenido">
        <fieldset>
        <legend>Modificar Tipo</legend>   
            <form id="formulario" action="procesarModifcarTipo.php" method="GET "onsubmit="return validarFormTipo()">
                <label> Nombre </label>
                <input id="nombre" type="text" id="nombre" name="nombre" value='<?php echo $dato['Tipo']?>'><br>  
                <input name="idTipo" type="hidden" value="<?php echo $dato['idTipo']?>">
                <input class="btn" type="submit" value="Enviar">
             </form>
        </fieldset>        
        </div>    
    
    </body>
</html>
