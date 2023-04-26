<?php

namespace App\Repository;

use App\Entity\DepartmentDegree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DepartmentDegree>
 *
 * @method DepartmentDegree|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartmentDegree|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartmentDegree[]    findAll()
 * @method DepartmentDegree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentDegreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DepartmentDegree::class);
    }

    public function save(DepartmentDegree $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DepartmentDegree $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DepartmentDegree[] Returns an array of DepartmentDegree objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DepartmentDegree
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
