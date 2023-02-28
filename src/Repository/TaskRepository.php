<?php

namespace App\Repository;

use App\Entity\Task;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

/**
 * @extends ServiceEntityRepository<Task>
 *
 * @method Task|null find($id, $lockMode = null, $lockVersion = null)
 * @method Task|null findOneBy(array $criteria, array $orderBy = null)
 * @method Task[]    findAll()
 * @method Task[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function save(Task $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Task $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function removeByUuid(Uuid $taskUuid, bool $flush = false): void
    {
        $this->getEntityManager()->remove($this->findOneBy(['uuid' => $taskUuid]));

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByDateDiapason(\DateTimeInterface $dateFrom, \DateTimeInterface $dateTo): array|float|int|string
    {
        $dateFrom->setTime('00', '00', '00');
        $dateTo->setTime('23', '59', '59');;

        $queryBuilder = $this->createQueryBuilder('f')
            ->select('f.id, f.uuid, f.description, f.deadline, f.status, f.file, f.completionDate')
            ->andWhere('f.deadline >= :dateFrom')
            ->andWhere('f.deadline <= :dateTo')
            ->setParameter('dateFrom', $dateFrom)
            ->setParameter('dateTo', $dateTo);

        return $queryBuilder->getQuery()->getArrayResult();
    }
}
