$(document).ready(function(){

$("a#borrar").click(function(){ 
    
    if(confirm("¿Esta seguro que desea borrar este elemento?")){
        return true;
    }
    return false;
});

});