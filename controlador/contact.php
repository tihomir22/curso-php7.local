<?php
require __DIR__.'/../utils/utils.php';

$errores = [];
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $apellidos = trim(htmlspecialchars($_POST['apellidos']));
    $email = trim(htmlspecialchars($_POST['email']));
    $asunto = trim(htmlspecialchars($_POST['asunto']));
    $texto = trim(htmlspecialchars($_POST['texto']));

    if (empty($nombre)) {
        $errores[] = "El nombre no puede estar vacio";
    }
    if (empty($email)) {
        $errores[] = "El email no puede estar vacio";
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errores[] = "El email no es valido";
        }
    }
    if (empty($asunto)) {
        $errores[] = "El asunto no puede estar vacio";
    }
    if (empty($errores)) {
        $mensaje="los datos del formulario son correctos";
    }


}

require __DIR__.'/../views/contact.view.php';
