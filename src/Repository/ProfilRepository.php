<?php

namespace App\Repository;

use App\Entity\Profil;
use App\Entity\Promotion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Profil>
 *
 * @method Profil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profil[]    findAll()
 * @method Profil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry
        ){
            parent::__construct($registry, Profil::class);
        }


    /** 
    * @param int $page
    * @return PaginationInterface
    */
    public function findByPromotion($promotion): array
   {
           return $this->createQueryBuilder('p')
           ->select('p.id, p.firstname, p.lastname')
           ->join('p.promotion', 'cat')
           ->andWhere('p.promotion = :id')
           ->setParameter('id', $promotion)
           ->getQuery()
           ->getResult();
       
   }
    /**
        * @return Profil[] Returns an array of Profil objects
        */
    public function findById($id): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }
//    /**
//     * @return Profil[] Returns an array of Profil objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

}
