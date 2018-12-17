<?php
/**
 * Created by PhpStorm.
 * User: sportak
 * Date: 17/12/2018
 * Time: 19:37
 */

require_once __DIR__.'/../database/IEntity.php';
class Partner implements IEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */

    private $logo;

    /**
     * @var string
     */

    private $nombre;

    /**
     * Partner constructor.
     * @param string $logo
     * @param string $nombre
     */
    public function __construct($logo='',$nombre='')
    {
        $this->id = null;
        $this->logo = $logo;
        $this->nombre = $nombre;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo)
    {
        $this->logo = $logo;
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
     */
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        return[
            'logo'=>$this->getNombre(),
            'nombre'=>$this->getLogo()
        ];
    }
}