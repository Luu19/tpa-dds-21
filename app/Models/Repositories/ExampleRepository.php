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

    public function index() : string
    {
        return "Proyecto Laravel";
    }
}
