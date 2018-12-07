<?php
require_once 'utils/utils.php';
require 'utils/File.php';
require 'entity/ImagenGaleria.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';

$errores=[];
$descripcion='';
$mensaje='';
$connection=Connection::main();
$imagenes='';

if ($_SERVER['REQUEST_METHOD']==='POST'){
    try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $mensaje = 'Datos enviados';
        $tiposAceptados=['image/jpeg','image/png','image/gif'];
        $imagen=new File('imagen',$tiposAceptados);
        #$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        #$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY,ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
        $mensaje='Se ha guardado la imagen';
        $sql="INSERT INTO imagenes(nombre,descripcion) VALUES ('".$imagen->getFilename()."','$descripcion')";
        $connection->exec($sql);
        if($connection->exec($sql)===false){
            $errores[]="No se ha podido insertar en la BDA";
        }else{
            $mensaje[]="Se ha guardado la imagen en la BDA";
        }


    }catch (FileException $fileException){
        $errores[]=$fileException->getMessage();
    }
    $queryBuilder=new QueryBuilder($connection);
    $imagenes=$queryBuilder->findAll('imagenes','ImagenGaleria');

}

require 'views/galeria.view.php';