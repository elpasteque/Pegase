<?php

namespace App\Repository;

use App\Entity\Signature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Signature|null find($id, $lockMode = null, $lockVersion = null)
 * @method Signature|null findOneBy(array $criteria, array $orderBy = null)
 * @method Signature[]    findAll()
 * @method Signature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SignatureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Signature::class);
    }

//    /**
//     * @return Signature[] Returns an array of Signature objects
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
    public function findOneBySomeField($value): ?Signature
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
