$(document).ready(function(){
   //Funcion que despliega un alert para confirmar el borrado
    $("a#borrar").click(function(){ 
        return (confirm("¿Esta seguro que desea borrar este elemento?"));
    });
});