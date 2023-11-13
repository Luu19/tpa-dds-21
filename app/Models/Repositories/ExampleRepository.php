<?php

namespace App\Models\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Illuminate\Support\Facades\DB;

class ExampleRepository extends EntityRepository
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

            return "Conexión a la base de datos exitosa.". $this->entityManager()->find("App\Models\Entities\Rol", 1);
        } catch (\Exception $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
}
