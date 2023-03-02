<?php

namespace App\Repository;

use App\Entity\ApiInvoiceRecieved;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ApiInvoiceRecieved>
 *
 * @method ApiInvoiceRecieved|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiInvoiceRecieved|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiInvoiceRecieved[]    findAll()
 * @method ApiInvoiceRecieved[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiInvoiceRecievedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiInvoiceRecieved::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ApiInvoiceRecieved $entity, bool $flush = true): void
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
    public function remove(ApiInvoiceRecieved $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ApiInvoiceRecieved[] Returns an array of ApiInvoiceRecieved objects
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
    public function findOneBySomeField($value): ?ApiInvoiceRecieved
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
