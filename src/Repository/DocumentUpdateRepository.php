<?php

namespace App\Repository;

use App\Entity\DocumentUpdate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentUpdate|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentUpdate|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentUpdate[]    findAll()
 * @method DocumentUpdate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentUpdateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentUpdate::class);
    }

//    /**
//     * @return DocumentUpdate[] Returns an array of DocumentUpdate objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentUpdate
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
