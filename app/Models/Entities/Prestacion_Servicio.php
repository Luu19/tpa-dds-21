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

    public function __construct($servicio, $unaDescripcion)
    {
        $this->incidentes = new ArrayCollection();
        $this->servicio = $servicio;
        $this->disponibilidad = true;
        $this->descripcion = $unaDescripcion;
    }
}
