<?php

namespace App\Models\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="incidente")
 */
class Incidente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="fechaApertura", type="datetime")
     */
    private $fechaApertura;

    /**
     * @ORM\Column(name="fechaCierreGeneral", type="datetime", nullable=true)
     */
    private $fechaCierreGeneral;

    /**
     * @ORM\OneToMany(targetEntity="FechaDeCierreComunidad", mappedBy="incidente", cascade={"persist", "merge", "remove"})
     */
    private $fechasDeCierre;

    /**
     * @ORM\Column(name="resuelto", type="boolean")
     */
    private $resuelto;

    /**
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;

    /**
     * @ORM\ManyToOne(targetEntity="Prestacion_Servicio")
     * @ORM\JoinColumn(name="prestacion_servicio_id", referencedColumnName="id")
     */
    private $prestacion;

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
    public function getFechaApertura()
    {
        return $this->fechaApertura;
    }

    /**
     * @param mixed $fechaApertura
     */
    public function setFechaApertura($fechaApertura): void
    {
        $this->fechaApertura = $fechaApertura;
    }

    /**
     * @return mixed
     */
    public function getFechaCierreGeneral()
    {
        return $this->fechaCierreGeneral;
    }

    /**
     * @param mixed $fechaCierreGeneral
     */
    public function setFechaCierreGeneral($fechaCierreGeneral): void
    {
        $this->fechaCierreGeneral = $fechaCierreGeneral;
    }

    public function getFechasDeCierre(): ArrayCollection
    {
        return $this->fechasDeCierre;
    }

    public function setFechasDeCierre(ArrayCollection $fechasDeCierre): void
    {
        $this->fechasDeCierre = $fechasDeCierre;
    }

    public function getResuelto(): bool
    {
        return $this->resuelto;
    }

    public function setResuelto(bool $resuelto): void
    {
        $this->resuelto = $resuelto;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones): void
    {
        $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getPrestacion()
    {
        return $this->prestacion;
    }

    /**
     * @param mixed $prestacion
     */
    public function setPrestacion($prestacion): void
    {
        $this->prestacion = $prestacion;
    }

    public function __construct($fechaApertura, $observaciones, $prestacionServicio)
    {
        $this->fechaApertura = $fechaApertura;
        $this->observaciones = $observaciones;
        $this->prestacion = $prestacionServicio;
        $this->fechasDeCierre = new ArrayCollection();
        $this->resuelto = false;
    }
}



