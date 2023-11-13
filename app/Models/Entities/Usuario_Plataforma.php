<?php

namespace App\Models\Entities;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario_plataforma")
 */
class Usuario_Plataforma
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="nombre", type="string")
     */
    private $nombre;

    /**
     * @ORM\Column(name="apellido", type="string")
     */
    private $apellido;

    /**
     * @ORM\Column(name="correo_electronico", type="string")
     */
    private $correoelectronico;

    /**
     * @ORM\Column(name="estado", type="string")
     */
    private $estado;

    /**
     * @ORM\OneToOne(targetEntity="Rol", fetch="EAGER")
     * @ORM\JoinColumn(name="rol_id", referencedColumnName="id")
     */
    private $rol;

    /**
     *
     * @ORM\OneToMany(targetEntity="Miembro", mappedBy="usuario", cascade={"PERSIST", "MERGE", "REMOVE"})
     * @var ArrayCollection|Miembro[]
     */
    private $membresias;

    /**
     * @param $nombre
     * @param $apellido
     * @param $correoelectronico
     * @param $estado
     * @param $rol
     * @param $membresias
     */
    public function __construct($nombre, $apellido, $correoelectronico, $estado, $rol, $membresias)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correoelectronico = $correoelectronico;
        $this->estado = $estado;
        $this->rol = $rol;
        $this->membresias = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getCorreoelectronico()
    {
        return $this->correoelectronico;
    }

    /**
     * @param mixed $correoelectronico
     */
    public function setCorreoelectronico($correoelectronico): void
    {
        $this->correoelectronico = $correoelectronico;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol): void
    {
        $this->rol = $rol;
    }

    /**
     * @return mixed
     */
    public function getMembresias()
    {
        return $this->membresias;
    }

    /**
     * @param mixed $membresias
     */
    public function setMembresias($membresias): void
    {
        $this->membresias = $membresias;
    }


}
