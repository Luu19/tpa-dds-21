<?php

namespace App\Models\Entities;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="servicio")
 */
class Servicio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    public function __construct($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}
