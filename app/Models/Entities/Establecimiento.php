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
     * @ORM\OneToMany(targetEntity="Prestacion_Servicio", mappedBy="establecimiento", cascade={"persist", "merge", "remove"})
     */
    private $prestacionServicios;

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

    public function getPrestacionServicios(): ArrayCollection
    {
        return $this->prestacionServicios;
    }

    public function setPrestacionServicios(ArrayCollection $prestacionServicios): void
    {
        $this->prestacionServicios = $prestacionServicios;
    }


    public function __construct()
    {
        $this->prestacionServicios = new ArrayCollection();
    }
}
