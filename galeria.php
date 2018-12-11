<?php
require_once 'utils/utils.php';
require 'utils/File.php';
require 'entity/ImagenGaleria.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require_once 'core/App.php';

$errores=[];
$descripcion='';
$mensaje='';
$config=require_once 'app/config.php';
App::bind('config',$config);
$connection=App::getConnection();
$imagenes='';

if ($_SERVER['REQUEST_METHOD']==='POST'){
    try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $mensaje = 'Datos enviados';
        $tiposAceptados=['image/jpeg','image/png','image/gif'];
        $imagen=new File('imagen',$tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY,ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
        $mensaje='Se ha guardado la imagen';

        #$sql="INSERT INTO imagenes(nombre,descripcion) VALUES ('".$imagen->getFilename()."','$descripcion')";
      #  $sql="INSERT INTO imagenes(nombre,descripcion) VALUES (:nombre,:descripcion)";
       # $pdoStatement=$connection->prepare($sql);
        #$parameters=[
         #   ':nombre'=>$imagen->getFilename(),
          #  ':descripcion'=>$descripcion
        #];


        if($pdoStatement->execute($parameters)===false){
            $errores[]="No se ha podido insertar en la BDA";
        }else{
            $mensaje="Se ha guardado la imagen en la BDA";
            $descripcion='';
        }


    }catch (FileException $fileException){
        $errores[]=$fileException->getMessage();
    }
    $queryBuilder=new QueryBuilder();
    #echo '<script>alert('.$connection.')</script>';
    $imagenes=$queryBuilder->findAll('imagenes','ImagenGaleria');

}else{
    $queryBuilder=new QueryBuilder();
    $imagenes=$queryBuilder->findAll('imagenes','ImagenGaleria');
}

require 'views/galeria.view.php';