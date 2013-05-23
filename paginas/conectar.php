<?php
    $host = 'localhost';
    $usuario = '';
    $contraseña = '';
    $db ='ingenieria2';  
    mysql_connect($host, $usuario, $contraseña) or die (mysql_error());
    mysql_select_db($db);
    mysql_query("SET NAMES 'utf8'");
?>