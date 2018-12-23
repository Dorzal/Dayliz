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



    public function active($category)
    {
        $date = new \DateTime('midnight');



        return $this->createQueryBuilder('p')
            ->where('p.category = :category')
            ->andWhere('p.date = :val')
            ->setParameter('category', $category)
            ->setParameter('val', $date)
            ->getQuery()
            ->getResult()
        ;
    }

}
