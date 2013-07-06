<?php

if (!array_key_exists('usuario', $_SESSION)) {
    header("location:/SAT/login.php");
    exit;
}


$usuario = $_SESSION['usuario'];


if ($usuario['rol'] == "ROLE_SECRETARIA") {
    include "NavBarSecretaria.php";
}

if ($usuario['rol'] == "ROLE_DIRECTOR") {
    include "NavBarDirector.php";
}

if ($usuario['rol'] == "ROLE_MEDICO") {
    include "NavBarMedico.php";
}




