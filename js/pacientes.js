$(document).ready(function(){
//RESTRICCIONES DE CAMPOS-------------------------------------------------------
    //Solo admiten Numeros
    $("#dni").keyup(function(){this.value = this.value.replace(/[^0-9]/g,''); });
    $("#calle").keyup(function(){this.value = this.value.replace(/[^0-9]/g,''); });
    $("#numero").keyup(function(){this.value = this.value.replace(/[^0-9]/g,''); });
    $("#telefono").keyup(function(){this.value = this.value.replace(/[^0-9]/g,''); });

    //Solo admiten letras
    $("#nombre").keyup(function(){this.value = this.value.replace(/[^A-Z]/g,''); });  
    $("#apellido").keyup(function(){this.value = this.value.replace(/[^A-Z]/g,''); });
//------------------------------------------------------------------------------
//VERIFICAR QUE TODO TENGA VALOR------------------------------------------------
    $("#botonCrear").click(function(){
    if(  ($("#dni").val() === "") || ($("#nombre").val() === "") || ($("#apellido").val() === "") 
    || ($("#provincia").val() === "") || ($("#localidad").val() === "") || ($("#calle").val() === "")
    || ($("#numero").val() === "") || ($("#telefono").val() === "")
    ){
        alert("Complete todos los campos");
    }
    else {
        $("#formularioAltaPaciente").submit();
    }
    });
//------------------------------------------------------------------------------



////Verificar que el DNI no existe.---------------------------------------------
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
   

//PARA AGREGAR MAS DE UNA OS dinamicamente--------------------------------------
$("#anadirOS").click(function(){
    
});    

    
});


