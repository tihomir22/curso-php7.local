<?php
/**
 * Created by PhpStorm.
 * User: Sandra
 * Date: 29/11/2018
 * Time: 11:57
 */
require_once __DIR__.'/../database/IEntity.php';
class ImagenGaleria implements IEntity
{
    const RUTA_IMAGENES_PORTFOLIO='images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY='images/index/gallery/';
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $descripcion;
    /**
     * @var int
     */
    private $numVisualizaciones;
    /**
     * @var int
     */
    private $numLikes;
    /**
     * @var int
     */
    private $numDownloads;

    /**
     * @var int
     */
    private $id;

    /**
     * ImagenGaleria constructor.
     * @param $id
     * @param string $nombre
     * @param string $descripcion
     * @param int $numVisualizaciones
     * @param int $numLikes
     * @param int $numDownloads
     */
    public function __construct($id=0,$nombre='', $descripcion='', $numVisualizaciones=0, $numLikes=0, $numDownloads=0)
    {
        $this->id=$id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $int
     */
    public function setId(int $int)
    {
        $this->id = $int;
    }


    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return ImagenGaleria
     */
    public function setNombre(string $nombre): ImagenGaleria
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return ImagenGaleria
     */
    public function setDescripcion(string $descripcion): ImagenGaleria
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumVisualizaciones(): int
    {
        return $this->numVisualizaciones;
    }

    /**
     * @param int $numVisualizaciones
     * @return ImagenGaleria
     */
    public function setNumVisualizaciones(int $numVisualizaciones): ImagenGaleria
    {
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumLikes(): int
    {
        return $this->numLikes;
    }

    /**
     * @param int $numLikes
     * @return ImagenGaleria
     */
    public function setNumLikes(int $numLikes): ImagenGaleria
    {
        $this->numLikes = $numLikes;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumDownloads(): int
    {
        return $this->numDownloads;
    }

    /**
     * @param int $numDownloads
     * @return ImagenGaleria
     */
    public function setNumDownloads(int $numDownloads): ImagenGaleria
    {
        $this->numDownloads = $numDownloads;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getDescripcion();
    }

    /**
     * @return string
     */
    public function getUrlPortfolio() : string {
        return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
    }

    /**
     * @return string
     */
    public function getUrlGallery() : string {
        return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
    }

    public function toArray():array
    {
        return[
          'nombre'=>$this->getNombre(),
            '$descripcion'=>$this->getDescripcion(),
            '$numVisualizaciones'=>$this->getNumVisualizaciones(),
            '$numLikes'=>$this->getNumLikes(),
            '$numDownloads'=>$this->getNumDownloads()
        ];
    }
}