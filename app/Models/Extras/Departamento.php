<?php

namespace App\Models\Extras;

/**
 * @ORM\Entity
 * @ORM\Table(name="departamento")
 */
class Departamento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(name="nombre", type="string")
     */
    public $nombre;

    /**
     * @ORM\Embedded(class="Provincia")
     */
    public $provincia;
}
