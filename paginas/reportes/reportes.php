
<?php  $activo = "reportes" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "../modulos/head.php" ?>  
        <script>
        $(document).ready(function() {// INICIO DOCUMENT READY

//-----------------------
    //OPCIONES PARA PASAR EL DATEPICKER A ESPAÑOL
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd-mm-yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['es']);

        $("#fechaDesde").datepicker();

        $("#fechaHasta").datepicker();

        //-----------------------  

    }); //FIN DOCUMENT READY
        
        </script>
        <title>Turnos</title>
    </head>
    <body>     
        <!--NavBar-->
 <?php include "../modulos/NavBarDirector.php" ?>
        <!-- Fin NavBar-->
        <div class="container">
            <h3>
                Generar Reporte </h3>
            <hr>
            <!-- Buscador-->
            <h5 class="text-info">Seleccione la opción deseada:</h5>
                <form method="POST" action="generarPDF.php" class="form-inline form-search">     
                    <fieldset>  
                        <select class="input-medium" name="estado" required="">
                            <option value="">Estado de Turnos</option>
                            <option value="Pendientes">Pendientes</option>
                            <option value="Cancelados">Cancelados</option>
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