<?php

namespace App\Repository;

use App\Entity\TaskCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TaskCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaskCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaskCategorie[]    findAll()
 * @method TaskCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaskCategorie::class);
    }

    // /**
    //  * @return TaskCategorie[] Returns an array of TaskCategorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TaskCategorie
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
