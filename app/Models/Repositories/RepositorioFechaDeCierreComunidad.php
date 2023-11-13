<?php

namespace App\Models\Repositories;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class RepositorioFechaDeCierreComunidad extends EntityRepository
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

    public function buscarIncidentesComunidades($comunidades, $cantidad)
    {
        $incidentes = [];
        foreach ($comunidades as $comunidad) {
            $query = $this->entityManager()->createQuery(
                "SELECT f FROM App\Models\Entities\FechaDeCierreComunidad f
                WHERE f.comunidad = :comunidad
                ORDER BY f.id DESC"
            );
            $query->setParameter('comunidad', $comunidad)
                  ->setMaxResults($cantidad);
            $incidentes = array_merge($incidentes, $query->getResult());
        }
        return $incidentes;
    }
}
