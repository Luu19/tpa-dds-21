<?php

namespace App\Models\Extras;

/**
 * @ORM\Entity
 * @ORM\Table(name="tipoEstablecimiento")
 */
class TipoEstablecimiento
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

    public function __construct($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}
