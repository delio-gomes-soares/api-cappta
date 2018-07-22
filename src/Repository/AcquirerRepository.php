<?php

namespace App\Repository;

use App\Entity\Acquirer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Acquirer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Acquirer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Acquirer[]    findAll()
 * @method Acquirer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcquirerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Acquirer::class);
    }

//    /**
//     * @return Acquirer[] Returns an array of Acquirer objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Acquirer
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
