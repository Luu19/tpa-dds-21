<?php

namespace App\Models\Repositories;

use Doctrine\ORM\EntityManagerInterface;

class RepositorioRol
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return EntityManagerInterface
     */
    public function entityManager() {
        return $this->entityManager;
    }

    public function estaLlegando() : string
    {
        try {
            return "Conexión a la base de datos exitosa.". $this->entityManager()->find("App\Models\Entities\Usuario_Plataforma", 1)->getNombre();
        } catch (\Exception $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
}
