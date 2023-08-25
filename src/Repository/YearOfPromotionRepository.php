<?php

namespace App\Repository;

use App\Entity\YearOfPromotion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<YearOfPromotion>
 *
 * @method YearOfPromotion|null find($id, $lockMode = null, $lockVersion = null)
 * @method YearOfPromotion|null findOneBy(array $criteria, array $orderBy = null)
 * @method YearOfPromotion[]    findAll()
 * @method YearOfPromotion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YearOfPromotionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, YearOfPromotion::class);
    }

//    /**
//     * @return YearOfPromotion[] Returns an array of YearOfPromotion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('y')
//            ->andWhere('y.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('y.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?YearOfPromotion
//    {
//        return $this->createQueryBuilder('y')
//            ->andWhere('y.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
