
<?php
//primero obtenemos el parametro que nos dice en que pagina estamos
$page = 1; //inicializamos la variable $page a 1 por default
if (array_key_exists('pg', $_GET)) {
    $page = $_GET['pg']; //si el valor pg existe en nuestra url, significa que estamos en una pagina en especifico.
}

if(!isset($tam_pag)){
    $tam_pag = 5;
}

//ahora que tenemos en que pagina estamos obtengamos los resultados:
// a) el numero de registros en la tabla
$consultaConteo = mysql_query($query);
$conteo = mysql_num_rows($consultaConteo);
//ahora dividimos el conteo por el numero de registros que queremos por pagina.
$max_num_paginas = ceil($conteo / $tam_pag); //en esto caso 3

// ahora obtenemos el segmento paginado que corresponde a esta pagina
$result = mysql_query($query." LIMIT " . (($page - 1) * $tam_pag) . ", ".$tam_pag);

?>


