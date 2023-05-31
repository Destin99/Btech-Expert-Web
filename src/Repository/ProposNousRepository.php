<?php

namespace App\Repository;

use App\Entity\ProposNous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProposNous>
 *
 * @method ProposNous|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProposNous|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProposNous[]    findAll()
 * @method ProposNous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProposNousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProposNous::class);
    }

    public function save(ProposNous $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProposNous $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ProposNous[] Returns an array of ProposNous objects
//     */
    public function findByStatutLimit($value): array
   {
       return $this->createQueryBuilder('p')
            ->andWhere('p.statut = :val')
            ->setParameter('val', $value)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?ProposNous
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
