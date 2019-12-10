<?php

namespace App\Repository;

use App\Entity\RequestType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RequestType|null find($id, $lockMode = null, $lockVersion = null)
 * @method RequestType|null findOneBy(array $criteria, array $orderBy = null)
 * @method RequestType[]    findAll()
 * @method RequestType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequestTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
    	parent::__construct($registry, RequestType::class);
    }

    // /**
    //  * @return ExampleEntity[] Returns an array of ExampleEntity objects
    //  */
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
    public function findOneBySomeField($value): ?ExampleEntity
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