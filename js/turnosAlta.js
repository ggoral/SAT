$(document).ready(function() {// INICIO DOCUMENT READY

//deshabilitar campos---
$("#especialidad").attr("disabled","disabled");
$("#medico").attr("disabled","disabled");
$("#fechaturno").attr("disabled","disabled");
$("#turno").attr("disabled","disabled");
//-----------------------
//
//VALIDAR QUE TODO TENGA VALOR
$("#botonCrear").click(function(){
    alert("presiono!");
});

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

//-----------------------PONE EL LIMITE DE A PARTIR DE QUE DIA SELECCIONAR
    var añoAct = new Date().getFullYear();
    var mesAct = new Date().getMonth();
    var diaAct = new Date().getDate();
    $("#fechaturno").datepicker({minDate: new Date( añoAct, mesAct, diaAct)}); //HABILITA EL DATE PICKER    //
    //-----------------------
    
    //AJAX PARA TRARME TODOS LOS TURNOS DE UN MEDICO
    $("#fechaturno").change(function() {
        $("#turno").removeAttr("disabled");  //REACTIVA TURNOS
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

//-----------------------
    //FUNCION QUE VALIDA EL PACIENTE
    
 $('#dni').keyup(function () { // EVITA QUE SE INGRESEN LETRAS
  this.value = this.value.replace(/[^0-9]/g,''); 
  $("#especialidad").removeAttr("disabled");
});
    
    $("#dni").blur(function() { // SE VALIDA QUE EL DNI EXISTA EN LA BASE DE DATOS
        $("#mensajePaciente").load("procesarAltaTurno.php" + '?dni=' + $("#dni").val());
    });
//-----------------------

    //FUNCION AJAX DE ESPECIALIDAD-MEDICO
    $("#especialidad").change(function() {
          $("#medico").removeAttr("disabled"); //REACTIVA MEDICOS
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

//-----------------------
$("#medico").change(function(){ // REACTIVA FECHAS 
    $("#fechaturno").removeAttr("disabled");
});
//-----------------------

}); //FIN DOCUMENT READY
