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
    public function findAllVisibleQuery(User $search): Query
    {
       // $query = $search->createQuery('SELECT * FROM User u WHERE u.name ==name and u.note ==note');

      /* $query = $this->findVisibleQuery();
       //$users = $query->getResult();
        if($search->getUserName()){
            $query= $query
                ->andWhere('u.user_name == :user_name')
                ->setParameter('user_name', $search->getUserName());
        }
        if($search->getUserNote()){
            $query= $query
                ->andWhere('u.user_note == :user_note')
                ->setParameter('note', $search->getUserNote());
        }
            return $query->getQuery();*/
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
