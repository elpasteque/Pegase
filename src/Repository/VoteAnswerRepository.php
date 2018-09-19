<?php

namespace App\Repository;

use App\Entity\VoteAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VoteAnswer|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoteAnswer|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoteAnswer[]    findAll()
 * @method VoteAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoteAnswerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VoteAnswer::class);
    }

//    /**
//     * @return VoteAnswer[] Returns an array of VoteAnswer objects
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
    public function findOneBySomeField($value): ?VoteAnswer
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
