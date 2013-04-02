$(document).ready(function() {// INICIO DOCUMENT READY

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

    var añoAct = new Date().getFullYear();
    var mesAct = new Date().getMonth();
    var diaAct = new Date().getDate();
    $("#fechaturno").datepicker({minDate: new Date( añoAct, mesAct, diaAct)}); //HABILITA EL DATE PICKER    //
    
    
    //AJAX PARA TRARME TODOS LOS TURNOS DE UN MEDICO
    $("#fechaturno").change(function() {
        var data = "fecha=" + $("#fechaturno").val() + "&medico=" + $("#medico").val();
        $.ajax({
            type: "POST",
            url: "procesarHorarioTurno.php",
            async: false,
            data: data,
            success: function(html) {
                $("#turno").empty();
                $("#turno").append(html);
            }
        });
    });

    //FUNCION QUE VALIDA EL PACIENTE
    $("#dni").blur(function() {
        $("#mensajePaciente").load("procesarAltaTurno.php" + '?dni=' + $("#dni").val());
    });



    //FUNCION AJAX DE ESPECIALIDAD-MEDICO
    $("#especialidad").change(function() {
        var data = "especialidad=" + $("#especialidad").val()+"&dni="+$("#dni").val();

        $.ajax({
            type: "POST",
            url: "procesarEspecialidad.php",
            async: false,
            data: data,
            success: function(html) {
                $("#medico").empty();
                $("#medico").append(html);
            }
        });

    });



}); //FIN DOCUMENT READY
