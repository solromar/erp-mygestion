<?php

namespace App\Repository;

use App\Entity\ApiInvoiceEmitted;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ApiInvoiceEmitted>
 *
 * @method ApiInvoiceEmitted|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiInvoiceEmitted|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiInvoiceEmitted[]    findAll()
 * @method ApiInvoiceEmitted[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiInvoiceEmittedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiInvoiceEmitted::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ApiInvoiceEmitted $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ApiInvoiceEmitted $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ApiInvoiceEmitted[] Returns an array of ApiInvoiceEmitted objects
    //  */
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
    public function findOneBySomeField($value): ?ApiInvoiceEmitted
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
