$(document).ready(function(){
   //Funcion que despliega un alert para confirmar el borrado
    $("a#borrar").click(function(){ 
        return (confirm("¿Esta seguro que desea borrar este elemento?"));
    });
});

 //Funcion que valida que no se ingrese un campo en blanco en alta de obras sociales
   function validarAltaOS() {
        miCampoTexto = document.getElementById("nombre").value;
        if (miCampoTexto.length === 0 || /^\s+$/.test(miCampoTexto)) {       
            alert ('Nombre vacio, debe ingresar un nombre');
            return false;          
        } 
       return true;
    }
    
  //Funcion que valida que no se ingrese un campo en blanco en modificacion de obras sociales
   function validarModificacionOS() {
        miCampoTexto = document.getElementById("nombre").value;
        if (miCampoTexto.length === 0 || /^\s+$/.test(miCampoTexto)) {       
            alert ('Nombre vacio, debe ingresar un nombre');
            return false;          
        } 
       return true;
    }