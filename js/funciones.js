$(document).ready(function(){

$("a#borrar").click(function(event){ 
    event.preventDefault();
    if(confirm("¿Esta seguro que desea borrar este elemento?")){
        return true;
    }
    return false;
});

});