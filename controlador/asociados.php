<?php
require_once __DIR__.'/../utils/utils.php';
require __DIR__.'/../utils/File.php';
require __DIR__.'/../entity/Asociado.php';
require __DIR__.'/../database/Connection.php';
require __DIR__.'/../repository/AsociadoRepository.php';
require_once __DIR__.'/../exceptions/QueryException.php';
require_once __DIR__.'/../exceptions/FileException.php';
require_once __DIR__.'/../core/App.php';



$errores=[];
$descripcion='';
$mensaje='';
try {
    $config= require_once __DIR__.'/../app/config.php';
    App::bind('config',$config);
    $asociadoRepository=new AsociadoRepository();
    $asociados='';

    if ($_SERVER['REQUEST_METHOD']==='POST'){

        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $mensaje = 'Datos enviados';
        if(isset($nombre) && isset($descripcion)) {
            $tiposAceptados=['image/jpeg','image/png','image/gif'];
            $imagen=new File('imagen',$tiposAceptados);
            $imagen->saveUploadFile(Asociado::RUTA_IMAGENES_LOGO);
            $asociado = new Asociado($nombre, $imagen->getFilename(), $descripcion);
            $asociadoRepository->save($asociado);
            $mensaje='Se ha guardado el socio con nombre ' &  $asociado->getNombre() & " con exito";
        }else{
            $errores[]='Debes poner todos los datos requeridos';
        }

        $descripcion='';



    }

    $asociados=$asociadoRepository->findAll();




}catch (QueryException $exception){
    throw new QueryException('Error de BDA');
}catch (FileException $exception){
    throw new FileException('Error a insertar en fichero');
}


require __DIR__.'/../views/asociados.view.php';