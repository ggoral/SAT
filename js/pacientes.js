var numcampo;
//READY------------------------------------------------------------------------
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

//PARA AGREGAR MAS DE UNA OS dinamicamente--------------------------------------
numcampo = 2;
var max = 3;
$("#añadirOS").click(function(){
    if (numcampo <= max){
        var contenido = '<select id="obra'+numcampo+'" name="obra'+numcampo+'" class="" style="width: 188px"><option>Seleccione Obra Social<option></select>   <a id="borrarCampo'+ numcampo +'"class="btn btn-mini btn-danger" onClick=borrarOS('+ numcampo +');><i class="icon-remove icon-white"></i></a>';
        $("#nuevos").append(contenido);
        $.ajax({ //carga las OS dependiendo el nuevo campo
            url: "cargarOS.php",
            async: false,
            success: function(html) {
                $('#obra'+numcampo).empty();
                $('#obra'+numcampo).append(html);
            }
        });      
        numcampo ++;
   }
});  
//Confirmar borrado-------------------------------------------------------------
$("#borrar").click(function(){
   confirm(); 
});


$("#botonGuardar").click(function(){
    if(  ($("#dni").val() === "") || ($("#nombre").val() === "") || ($("#apellido").val() === "") 
    || ($("#provincia").val() === "") || ($("#localidad").val() === "") || ($("#calle").val() === "")
    || ($("#numero").val() === "") || ($("#telefono").val() === "")
    ){
        alert("Complete todos los campos");
    }
    else {
        alert("Cambios Guardados")
        $("#formularioEditarPaciente").submit();
    }
    });

});//FIN READY
//------------------------------------------------------------------------------
//PARA BORRAR UNA OS AGREGADA---------------------------------------------------
function borrarOS(num){
$('#obra'+num).remove();
$('#borrarCampo'+num).remove();
numcampo--;
return false;
};

