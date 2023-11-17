<?php

namespace App\Models\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="prestacion_servicio")
 */
class Prestacion_Servicio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="disponibilidad", type="boolean")
     */
    private $disponibilidad;

    /**
     * @ORM\ManyToOne(targetEntity="Servicio")
     * @ORM\JoinColumn(name="servicio_id", referencedColumnName="id")
     */
    private $servicio;

    /**
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="Incidente", mappedBy="prestacion", cascade={"persist", "merge", "remove"})
     */
    private $incidentes;

    /**
     * @ORM\ManyToOne(targetEntity="Establecimiento")
     */
    private $establecimiento;

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

    public function getDisponibilidad(): bool
    {
        return $this->disponibilidad;
    }

    public function setDisponibilidad(bool $disponibilidad): void
    {
        $this->disponibilidad = $disponibilidad;
    }

    /**
     * @return mixed
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * @param mixed $servicio
     */
    public function setServicio($servicio): void
    {
        $this->servicio = $servicio;
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

    public function getIncidentes(): ArrayCollection
    {
        return $this->incidentes;
    }

    public function setIncidentes(ArrayCollection $incidentes): void
    {
        $this->incidentes = $incidentes;
    }

    /**
     * @return mixed
     */
    public function getEstablecimiento()
    {
        return $this->establecimiento;
    }

    /**
     * @param mixed $establecimiento
     */
    public function setEstablecimiento($establecimiento): void
    {
        $this->establecimiento = $establecimiento;
    }

    public function __construct($servicio, $unaDescripcion)
    {
        $this->incidentes = new ArrayCollection();
        $this->servicio = $servicio;
        $this->disponibilidad = true;
        $this->descripcion = $unaDescripcion;
    }
}
