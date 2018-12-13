<?php
require_once 'utils/utils.php';
require 'utils/File.php';
require 'entity/ImagenGaleria.php';
require 'database/Connection.php';
require 'repository/ImagenGaleriaRepository.php';
require_once 'exceptions/QueryException.php';
require_once 'exceptions/FileException.php';
require_once 'core/App.php';

$errores=[];
$descripcion='';
$mensaje='';
try {
    $config=require_once 'app/config.php';
    App::bind('config',$config);
    $imagenGaleriaRepository=new ImagenGaleriaRepository();
    $imagenes='';

    if ($_SERVER['REQUEST_METHOD']==='POST'){

            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $mensaje = 'Datos enviados';
            $tiposAceptados=['image/jpeg','image/png','image/gif'];
            $imagen=new File('imagen',$tiposAceptados);

            $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY,ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


            $imagenGaleria=new ImagenGaleria($imagen->getFilename(),$descripcion);
        echo '<script>alert("llegamos")</script>';
            $imagenGaleriaRepository->save($imagenGaleria);
            $mensaje='Se ha guardado la imagen';
            $descripcion='';



    }

        $imagenes=$imagenGaleriaRepository->findAll();


}catch (QueryException $exception){
    throw new QueryException('Error de BDA');
}catch (FileException $exception){
    throw new FileException('Error a insertar en fichero');
}


require 'views/galeria.view.php';