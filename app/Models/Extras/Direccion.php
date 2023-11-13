<?php

namespace App\Models\Extras;

/**
 * @ORM\Entity
 * @ORM\Table(name="direccion")
 */
class Direccion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(cascade={"PERSIST", "MERGE"})
     * @ORM\JoinColumn(name="departamento_id", referencedColumnName="id")
     */
    public $departamento;

    /**
     * @ORM\Column(name="calle", type="string")
     */
    public $calle;

    /**
     * @ORM\Column(name="altura", type="integer")
     */
    public $altura;
}
