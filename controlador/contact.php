<?php
require __DIR__.'/../utils/utils.php';
require __DIR__.'/../entity/Contactos.php';
require __DIR__.'/../database/Connection.php';
require __DIR__.'/../repository/ContactosRepository.php';
require_once __DIR__.'/../exceptions/QueryException.php';
require_once __DIR__.'/../core/App.php';

$errores = [];
$mensaje = "";
try {
    $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config);
    $contactosRepository = new ContactosRepository();

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
            $mensaje = "los datos del formulario son correctos";

            $contacto=new Contactos($nombre,$apellidos,$email,$asunto,$texto);
            $contactosRepository->save($contacto);

        }


    }
    $comentarios=$contactosRepository->findAll();
    //echo '<script>alert('.sizeof($comentarios).')</script>';

}catch(Exception $e){
    throw new Exception($e->getMessage());
}

require __DIR__.'/../views/contact.view.php';
