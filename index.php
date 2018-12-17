<?php
    require_once 'entity/ImagenGaleria.php';
    require __DIR__.'/entity/Partner.php';
    require 'utils/utils.php';
    require __DIR__.'/utils/File.php';
    require __DIR__.'/database/Connection.php';
    require __DIR__.'/repository/PartnerRepository.php';
    require_once __DIR__.'/exceptions/QueryException.php';
    require_once __DIR__.'/core/App.php';

    $imagenes=[];


    for ($i=1;$i<=12;$i++){
        $imagenes[]=new ImagenGaleria($i.".jpg","Descripcion imagen".$i,$i,$i,$i);
    }

    try {
        $config = require_once __DIR__ . '/app/config.php';
        App::bind('config', $config);
        $partnerRepository = new PartnerRepository();
        if($_SERVER['REQUEST_METHOD']==='POST') {
            $tiposAceptados=['image/jpeg','image/png','image/gif'];
            $imagen=new File('imagen',$tiposAceptados);

            $imagen->saveUploadFile('images/index/gallery/');

            $imagen->copyFile('images/index/gallery/','images/index/portfolio/');

            $partner=new Partner($imagen->getFilename(),$_POST['nombre']);
            $partnerRepository->save($partner);

        }



    }catch(Exception $e){
        throw new Exception($e->getMessage());
    }


    require 'views/index.view.php';

