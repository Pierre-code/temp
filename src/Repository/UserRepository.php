<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\UserSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use phpDocumentor\Reflection\Types\Integer;
use Doctrine\ORM\QueryBuilder;



/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findFirst(): ?User
    {
        $user = $this->createQueryBuilder('user')
            ->getQuery()
            ->setMaxResults(1)
            ->getResult();
        return $user ? $user[0] : null;
    }

    public function findVisibleQuery():QueryBuilder
    {
        return $this->createQueryBuilder('p');
    }

    public function findAllVisibleQuery(UserSearch $search): Query
    {
       $query = $this->findVisibleQuery();
       //$users = $query->getResult();

      /*  if($search->getMinNote()){
            $query= $query
                ->andWhere('p.note <= :min_note')
                ->setParameter('min_note',$search->getMinNote());
        }
        if($search->getMaxNote()){
            $query= $query
                ->andWhere('p.note <= :max_note')
                ->setParameter('max_note',$search->getMaxNote());
        }*/

        return $query->getQuery();
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
