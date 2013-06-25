$(document).ready(function(){
//RESTRICCIONES DE CAMPOS------------------------------------------------------------
    //Solo admiten Numeros
    $("#dni").keyup(function(){this.value = this.value.replace(/[^0-9]/g,''); });
    $("#calle").keyup(function(){this.value = this.value.replace(/[^0-9]/g,''); });
    $("#numero").keyup(function(){this.value = this.value.replace(/[^0-9]/g,''); });
    $("#telefono").keyup(function(){this.value = this.value.replace(/[^0-9]/g,''); });
    
    //Solo admiten letras
    $("#nombre").keyup(function(){this.value = this.value.replace(/[^A-Z]/g,''); });  
    $("#apellido").keyup(function(){this.value = this.value.replace(/[^A-Z]/g,''); });
//-----------------------------------------------------------------------------------


////Verificar que el DNI no existe.--------------------------------------------------
   $("#dni").change(function(){
       $("#especialidad").removeAttr("disabled"); //reactiva especialidades
       var data = "osocial=" + $("#obraSocial").val();
        $.ajax({
            type: "POST",
            url: "verificarObraSocial.php",
            async: false,
            data: data,
            success: function(html) {
                $("#mensajeObraSocial").empty();
                $("#mensajeObraSocial").append(html);
            }
        });
       
    });
});
