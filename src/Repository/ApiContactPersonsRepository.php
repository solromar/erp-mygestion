<?php

namespace App\Repository;

use App\Entity\ApiContactPersons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ApiContactPersons>
 *
 * @method ApiContactPersons|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiContactPersons|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiContactPersons[]    findAll()
 * @method ApiContactPersons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiContactPersonsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiContactPersons::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ApiContactPersons $entity, bool $flush = true): void
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
    public function remove(ApiContactPersons $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ApiContactPersons[] Returns an array of ApiContactPersons objects
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
    public function findOneBySomeField($value): ?ApiContactPersons
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
