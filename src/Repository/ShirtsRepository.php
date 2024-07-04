<?php

namespace App\Repository;

use App\Entity\Shirts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Shirts>
 *
 * @method Shirts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shirts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shirts[]    findAll()
 * @method Shirts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShirtsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shirts::class);
    }

//    /**
//     * @return Shirts[] Returns an array of Shirts objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Shirts
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
