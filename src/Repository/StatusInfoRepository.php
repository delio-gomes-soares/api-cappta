<?php

namespace App\Repository;

use App\Entity\StatusInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StatusInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusInfo[]    findAll()
 * @method StatusInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusInfoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StatusInfo::class);
    }

//    /**
//     * @return StatusInfo[] Returns an array of StatusInfo objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatusInfo
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
