<?php

namespace App\Models\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ExampleRepository extends EntityRepository
{

    /**
     * @return EntityManager
     */
    public function entityManager() {
        return $this->entityManager();
    }
}
