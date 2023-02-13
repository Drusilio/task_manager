<?php

namespace App\Repository;

use App\Entity\ResponsiblePerson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ResponsiblePerson>
 *
 * @method ResponsiblePerson|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponsiblePerson|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponsiblePerson[]    findAll()
 * @method ResponsiblePerson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsiblePersonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResponsiblePerson::class);
    }

    public function save(ResponsiblePerson $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ResponsiblePerson $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
