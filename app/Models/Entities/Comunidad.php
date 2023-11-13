<?php

namespace App\Models\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="comunidad")
 */
class Comunidad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="descripcion", type="string")
     */
    private $descripcion;

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

    public function getMiembros(): ArrayCollection
    {
        return $this->miembros;
    }

    public function setMiembros(ArrayCollection $miembros): void
    {
        $this->miembros = $miembros;
    }

    public function getPrestacionesDeInteres(): ArrayCollection
    {
        return $this->prestacionesDeInteres;
    }

    public function setPrestacionesDeInteres(ArrayCollection $prestacionesDeInteres): void
    {
        $this->prestacionesDeInteres = $prestacionesDeInteres;
    }

    /**
     * @ORM\OneToMany(targetEntity="Miembro", mappedBy="comunidad", cascade={"persist", "merge", "remove"})
     */
    private $miembros;

    /**
     * @ORM\ManyToMany(targetEntity="Prestacion_Servicio", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="comunidad_prestacion_servicio",
     *      joinColumns={@ORM\JoinColumn(name="comunidad_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="prestacion_servicio_id", referencedColumnName="id")}
     * )
     */
    private $prestacionesDeInteres;

    public function __construct()
    {
        $this->miembros = new ArrayCollection();
        $this->prestacionesDeInteres = new ArrayCollection();
    }
}
