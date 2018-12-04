<?php
require_once 'utils/utils.php';
require 'utils/File.php';
require 'entity/ImagenGaleria.php';

$errores=[];
$descripcion='';
$mensaje='';

if ($_SERVER['REQUEST_METHOD']==='POST'){
    try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $mensaje = 'Datos enviados';
        $tiposAceptados=['image/jpeg','image/png','image/gif'];
        $imagen=new File('imagen',$tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY,ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
        $mensaje='Se ha guardado la imagen';

    }catch (FileException $fileException){
        $errores[]=$fileException->getMessage();
    }
}

require 'views/galeria.view.php';