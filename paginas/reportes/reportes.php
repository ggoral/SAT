
<?php // $activo = "turno" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "../modulos/head.php" ?>  
        <script src="/SAT/js/filtroTurno.js"></script>
        <title>Turnos</title>
    </head>
    <body>     
        <!--NavBar-->
 <?php include "../modulos/NavBarDirectorPrueba.php" ?>
        <!-- Fin NavBar-->
        <div class="container">
            <h3>
                Generar Reporte </h3>
            <hr>
            <!-- Buscador-->
            <h5 class="text-info">Seleccione la opción deseada:</h5>
                <form action="#" class="form-inline form-search">     
                    <?php $queryOS = "select * from obrasocial where habilitada=true and eliminado=false";
                      $resultado = mysql_query($queryOS);      
                    ?>
                    <fieldset>  
                        <select class="input-medium" name="obrasocial">
                            <option value="">Estado de Turnos</option>
                            <option value="">Pendientes</option>
                            <option value="">Cancelados</option>
                        </select>          
                        <label> Fecha desde </label>
                        <input id="fechaDesde" name="fechaDesde"  class="span2 search-query" type="text" value="<?php $today = new \DateTime(); echo $today->format("d-m-Y")?>"> 
                        <label> Fecha hasta </label>
                        <?php $h = new \DateTime(); $h->modify('+7 day');?>
                        <input id="fechaHasta" name="fechaHasta" class="span2 search-query" type="text" value="<?php echo $h->format("d-m-Y");?>">   
                    
                    
                    
                        <button type="submit" class="btn btn-info btn-small" value="Buscar turno ">GENERAR REPORTE <i class="icon-ok icon-white"></i></button>
                        </fieldset>
                </form> 
            <br><hr>
        </div>        <!--Fin Container-->
        <footer class="">   
        </footer>
    </body>        
</html>