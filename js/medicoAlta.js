(document).ready(function() {// INICIO DOCUMENT READY


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
   
}); //FIN DOCUMENT READY
    