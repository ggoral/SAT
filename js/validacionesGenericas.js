$(document).ready(function(){
    
    
    
    //Carga las Localidades segun la provincia elegida------------------------------
    $("#provincia").change(function(){
        var data = "provincia=" +  this.value;
        $.ajax({
            type: "POST",
            url: "cargarLocalidades.php",
            async: false,
            data: data,
            success: function(html) {
                $("#localidad").empty();
                $("#localidad").append(html);
            }
        });
    });
    
    
    ////Verificar que el DNI no existe Crea un mensaje de error en el DIV id="mensajeDNI"
   $("#dni").focusout(function(){
       var data = "dni=" + $("#dni").val();
        $.ajax({
            type: "POST",
            url: "verificarDNI.php",
            async: false,
            data: data,
            success: function(html) {
                $("#mensajeDNI").empty();
                $("#mensajeDNI").append(html);
            }
        });

    });
    
    
    

});

