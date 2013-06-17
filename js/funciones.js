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
  
   //Funcion que valida todos los campos del alta de medico
       function validarAltaMedico() {
        campoMatricula = document.getElementById("matricula").value;
        campoNombre = document.getElementById("nombre").value;
        campoApellido = document.getElementById("apellido").value;
        campoDNI = document.getElementById("dni").value;        
        campoProvincia = document.getElementById("provincia").value;
        campoLocalidad = document.getElementById("localidad").value;
        campoCalle = document.getElementById("calle").value;
        campoNumero = document.getElementById("numero").value;
        campoTelefono = document.getElementById("telefono").value;
        campoEmail = document.getElementById("email").value;
        campoEspecialidad= document.getElementById("especialidad").value;
        campoObraSocial= document.getElementById("obra").value;
        
        if (campoMatricula.length === 0 || isNaN(campoMatricula) || /^\s+$/.test(campoMatricula)) {       
            alert ('Ingrese una matricula valida');
            return false;          
        } 
         if (campoNombre.length === 0 || /^\s+$/.test(campoNombre) || !campoNombre.match(/[A-Z]/)) {       
            alert ('Ingrese un nombre valido');
            return false;          
        } 
         if (campoApellido.length === 0 || /^\s+$/.test(campoApellido) || !campoApellido.match(/[A-Z]/)) {       
            alert ('Ingrese un apellido valido');
            return false;          
        } 
         if (campoDNI.length === 0 || isNaN(campoDNI) || /^\s+$/.test(campoDNI)) {       
            alert ('Ingrese un DNI valido');
            return false;          
        } 
          if (campoProvincia.length === 0) {       
            alert ('Seleccione una Provincia');
            return false;          
        } 
          if (campoLocalidad.length === 0 || /^\s+$/.test(campoLocalidad) || !campoLocalidad.match(/[A-Z]/)) {       
            alert ('Ingrese una localidad valida');
            return false;          
        } 
         if ( campoCalle.length === 0) {       
            alert ('Ingrese una calle valida');
            return false;          
        } 
          if (campoNumero.length === 0 || isNaN(campoNumero) || /^\s+$/.test(campoNumero)) {       
            alert ('Ingrese un numero valido');
            return false;          
        } 
          if (campoTelefono.length === 0 || isNaN(campoTelefono) || /^\s+$/.test(campoTelefono)) {       
            alert ('Ingrese un telefono valido');
            return false;          
        } 
          if ( campoEmail.length === 0 ) {       
            alert ('Ingrese un email valido');
            return false;          
        } 
           if ( campoEspecialidad.length === 0 ) {       
            alert ('Seleccione una especialidad');
            return false;          
        } 
            if ( campoObraSocial.length === 0 ) {       
            alert ('Seleccione una obra social');
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