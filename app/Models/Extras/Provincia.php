<?php

namespace App\Models\Extras;

/**
 * @ORM\Embeddable
 */
class Provincia
{
    /**
     * @ORM\Column(name="nombre_provincia", type="string")
     */
    public $nombre;
}
