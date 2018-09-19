<?php

namespace App\Repository;

use App\Entity\EncryptionKey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EncryptionKey|null find($id, $lockMode = null, $lockVersion = null)
 * @method EncryptionKey|null findOneBy(array $criteria, array $orderBy = null)
 * @method EncryptionKey[]    findAll()
 * @method EncryptionKey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EncryptionKeyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EncryptionKey::class);
    }

//    /**
//     * @return EncryptionKey[] Returns an array of EncryptionKey objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EncryptionKey
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
