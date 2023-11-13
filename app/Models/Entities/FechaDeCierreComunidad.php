<?php

namespace App\Models\Entities;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="fechaDeCierreIncidente")
 */
class FechaDeCierreComunidad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Comunidad")
     * @ORM\JoinColumn(name="comunidad_id", referencedColumnName="id")
     */
    private $comunidad;


    /**
     * @ORM\Column(name="fechaCierre", type="datetime", nullable=true)
     */
    private $fechaCierre;

    /**
     * @ORM\ManyToOne(targetEntity="Incidente", fetch="EAGER")
     * @ORM\JoinColumn(name="incidente_id", referencedColumnName="id")
     * @var Incidente
     */
    private $incidente;

    public function __construct($comunidad, $incidente)
    {
        $this->comunidad = $comunidad;
        $this->fechaCierre = null;
        $this->incidente = $incidente;
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
    public function getComunidad()
    {
        return $this->comunidad;
    }

    /**
     * @param mixed $comunidad
     */
    public function setComunidad($comunidad): void
    {
        $this->comunidad = $comunidad;
    }

    /**
     * @return null
     */
    public function getFechaCierre()
    {
        return $this->fechaCierre;
    }

    /**
     * @param null $fechaCierre
     */
    public function setFechaCierre($fechaCierre): void
    {
        $this->fechaCierre = $fechaCierre;
    }

    /**
     * @return mixed
     */
    public function getIncidente()
    {
        return $this->incidente;
    }

    /**
     * @param mixed $incidente
     */
    public function setIncidente($incidente): void
    {
        $this->incidente = $incidente;
    }


    public function resuelto()
    {
        return $this->fechaCierre !== null;
    }
}
