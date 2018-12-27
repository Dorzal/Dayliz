<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }



    public function activeByCategory($category)
    {
        $date = new \DateTime('midnight',  new \DateTimeZone('Europe/Paris'));


        return $this->createQueryBuilder('p')
            ->where('p.category = :category')
            ->andWhere('p.date = :val')
            ->setParameter('category', $category)
            ->setParameter('val', $date)
            ->getQuery()
            ->getResult()
            ;
    }

    public function active()
    {
        $date = new \DateTime('midnight',  new \DateTimeZone('Europe/Paris'));

        return $this->createQueryBuilder('p')
            ->Where('p.date = :val')
            ->setParameter('val', $date)
            ->getQuery()
            ->getResult()
            ;
    }

    public function focus($id){

        $date = new \DateTime('midnight',  new \DateTimeZone('Europe/Paris'));

        return $this->createQueryBuilder('p')
            ->Where('p.date = :val')
            ->andWhere('p.id = :id')
            ->setParameter('val', $date)
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
            ;
    }

}
