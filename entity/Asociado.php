<?php
/**
 * Created by PhpStorm.
 * User: sportak
 * Date: 18/12/2018
 * Time: 8:09
 */

require_once __DIR__.'/../database/IEntity.php';
class Asociado implements IEntity
{

    const RUTA_IMAGENES_LOGO='../images/asociados/';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */

    private $nombre;

    /**
     * @var string
     */

    private $logo;
    /**
     * @var string
     */
    private $descripcion;

    /**
     * Asociado constructor.
     * @param int $id
     * @param string $nombre
     * @param string $logo
     * @param string $descripcion
     */
    public function __construct($nombre='', $logo='', $descripcion='')
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getUrlGallery() : string {
        return self::RUTA_IMAGENES_LOGO.$this->getLogo();
    }




    public function toArray()
    {
        return[
            'nombre'=>$this->getNombre(),
            'logo'=>$this->getLogo(),
            'descripcion'=>$this->getDescripcion()

        ];
    }
}