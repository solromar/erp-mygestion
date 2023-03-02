<?php

namespace App\Repository;

use App\Entity\ApiBillAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ApiBillAddress>
 *
 * @method ApiBillAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiBillAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiBillAddress[]    findAll()
 * @method ApiBillAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiBillAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiBillAddress::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ApiBillAddress $entity, bool $flush = true): void
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
    public function remove(ApiBillAddress $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ApiBillAddress[] Returns an array of ApiBillAddress objects
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
    public function findOneBySomeField($value): ?ApiBillAddress
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
