<?php

namespace App\Models\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="miembro")
 */
class Miembro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario_Plataforma", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="Comunidad", cascade={"persist", "merge"})
     * @ORM\JoinColumn(name="comunidad_id", referencedColumnName="id")
     */
    private $comunidad;

    /**
     * @ORM\ManyToOne(targetEntity="Rol", cascade={"persist", "merge"})
     * @ORM\JoinColumn(name="rol_id", referencedColumnName="id")
     */
    private $rol;

    /**
     * @ORM\ManyToMany(targetEntity="Prestacion_Servicio", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="miembro_prestacion_servicio",
     *      joinColumns={@ORM\JoinColumn(name="miembro_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="prestacion_servicio_id", referencedColumnName="id")}
     * )
     */
    private $prestacionesObservadas;

    /**
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo = true;

    public function __construct($usuario, $comunidad, $rol)
    {
        $this->usuario = $usuario;
        $this->comunidad = $comunidad;
        $this->rol = $rol;
        $this->prestacionesObservadas = new ArrayCollection();
        $comunidad->agregarMiembro($this);
    }
}
