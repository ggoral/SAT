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

//-----------------------PONE EL LIMITE DE A PARTIR DE QUE DIA SELECCIONAR
    var añoAct = new Date().getFullYear();
    var mesAct = new Date().getMonth();
    var diaAct = new Date().getDate();
    $("#fechaDesde").datepicker({
        minDate: new Date( añoAct, mesAct, diaAct),
        maxDate: new Date(añoAct, mesAct, diaAct + 150)
    }); 
    
    $("#fechaHasta").datepicker({
        minDate: new Date( añoAct, mesAct, diaAct),
        maxDate: new Date(añoAct, mesAct, diaAct + 150)
    }); 
    ////HABILITA EL DATE PICKER    //
    //-----------------------  

}); //FIN DOCUMENT READY
