<?php
/**
 * Created by PhpStorm.
 * User: sportak
 * Date: 17/12/2018
 * Time: 17:51
 */
require_once __DIR__.'/../database/IEntity.php';
class Contactos implements IEntity
{
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
    private $apellidos;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $asunto;
    /**
     * @var string
     */
    private $mensaje;

    /**
     * Contactos constructor.
     * @param string $nombre
     * @param string $apellidos
     * @param string $email
     * @param string $asunto
     * @param string $mensaje
     */
    public function __construct($nombre='', $apellidos='', $email='',$asunto='',$mensaje='')
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
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
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos(string $apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getAsunto(): string
    {
        return $this->asunto;
    }

    /**
     * @param string $asunto
     */
    public function setAsunto(string $asunto)
    {
        $this->asunto = $asunto;
    }

    /**
     * @return string
     */
    public function getMensaje(): string
    {
        return $this->mensaje;
    }

    /**
     * @param string $mensaje
     */
    public function setMensaje(string $mensaje)
    {
        $this->mensaje = $mensaje;
    }




    public function toArray()
    {
        return  [
            'nombre'=>$this->getNombre(),
            'apellidos'=>$this->getApellidos(),
            'email'=>$this->getEmail(),
            'asunto'=>$this->getAsunto(),
            'mensaje'=>$this->getMensaje()
        ];
    }
}