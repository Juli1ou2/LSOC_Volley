<?php

namespace App\Repository;

use App\Entity\Entraineur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Entraineur>
 *
 * @method Entraineur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entraineur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entraineur[]    findAll()
 * @method Entraineur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntraineurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entraineur::class);
    }

//    /**
//     * @return Entraineur[] Returns an array of Entraineur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Entraineur
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
