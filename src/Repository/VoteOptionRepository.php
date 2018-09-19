<?php

namespace App\Repository;

use App\Entity\VoteOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VoteOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoteOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoteOption[]    findAll()
 * @method VoteOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoteOptionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VoteOption::class);
    }

//    /**
//     * @return VoteOption[] Returns an array of VoteOption objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VoteOption
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
