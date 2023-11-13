<?php

namespace App\Models\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rol")
 */
class Rol
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="bigint", nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(name="descripcion", type="string", nullable=true)
     */
    private $descripcion;

    /**
     *
     * @ORM\Column(name="tipo", type="string", nullable=true)
     */
    private $tipo;

    /**
     * @ORM\ManyToMany(targetEntity="Permiso")
     * @ORM\JoinTable(name="rol_permisos",
     *      joinColumns={@ORM\JoinColumn(name="rol_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="permiso_id", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection|Permiso[]
     */
    private $permisos;

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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return Permiso[]|ArrayCollection
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * @param Permiso[]|ArrayCollection $permisos
     */
    public function setPermisos($permisos): void
    {
        $this->permisos = $permisos;
    }

    public function __construct($descripcion, $permisos)
    {
        $this->descripcion = $descripcion;
        $this->permisos = new ArrayCollection();
    }

}

