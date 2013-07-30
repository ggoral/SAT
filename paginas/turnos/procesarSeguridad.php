<?php
session_start();
if (array_key_exists('usuario', $_SESSION)) {
    $usuario = $_SESSION['usuario'];

//    print_r($usuario);

//    if ($usuario['rol'] == "ROLE_MEDICO") {
//        header("location: /SAT/login.php?error=error");
//        exit;
//    }

//    if ($usuario['rol'] == "ROLE_SECRETARIA") {
//        header("location: /SAT/login.php?error=error");
//        exit;
//    }
//
//    if ($usuario['rol'] == "ROLE_DIRECTOR") {
//        header("location: /SAT/login.php?error=error");
//        exit;
//    }
} else {
    header("location: /SAT/login.php?error=error");
    exit;
}
?>