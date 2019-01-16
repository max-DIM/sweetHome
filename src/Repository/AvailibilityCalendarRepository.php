<?php

namespace App\Repository;

use App\Entity\AvailibilityCalendar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AvailibilityCalendar|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvailibilityCalendar|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvailibilityCalendar[]    findAll()
 * @method AvailibilityCalendar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvailibilityCalendarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AvailibilityCalendar::class);
    }

    // /**
    //  * @return AvailibilityCalendar[] Returns an array of AvailibilityCalendar objects
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
    public function findOneBySomeField($value): ?AvailibilityCalendar
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
