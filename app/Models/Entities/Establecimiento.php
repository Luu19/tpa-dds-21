<?php

namespace App\Models\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="establecimiento")
 */
class Establecimiento
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
     * @ORM\ManyToOne(targetEntity="Direccion", cascade={"persist", "merge"})
     * @ORM\JoinColumn(name="ubicacion_id", referencedColumnName="id")
     */
    private $ubicacion;

    /**
     * @ORM\OneToMany(targetEntity="Prestacion_Servicio", mappedBy="establecimiento", cascade={"persist", "merge", "remove"})
     */
    private $prestacionServicios;

    /**
     * @ORM\ManyToOne(targetEntity="TipoEstablecimiento")
     * @ORM\JoinColumn(name="tipoEstablecimiento_id", referencedColumnName="id")
     */
    private $tipoEstablecimiento;

    public function __construct()
    {
        $this->prestacionServicios = new ArrayCollection();
    }
}
