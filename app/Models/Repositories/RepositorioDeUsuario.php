<?php

namespace App\Models\Repositories;
use App\Models\Entities\Usuario_Plataforma;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class RepositorioDeUsuario extends EntityRepository
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

    public function buscarComunidades($id)
    {
        $query = $this->entityManager()->createQuery(
            "SELECT c FROM App\Models\Entities\Usuario_Plataforma u
            INNER JOIN App\Models\Entities\Miembro m WITH m.usuario = u.id AND m.activo = 1
            INNER JOIN App\Models\Entities\Comunidad c WITH c.id = m.comunidad
            WHERE u.id = :id"
        );

        $query->setParameter('id', $id);

        return $query->getResult();
    }

    public function findById($id)
    {
        $usuario = $this->entityManager()->find(Usuario_Plataforma::class, $id);
        if($usuario->getEstado() == 'A') {
            return $usuario;
        }else {
            throw new \Exception("El usuario está inactivo");
        }
    }

}
