<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 23/12/2018
 * Time: 00:49
 */

namespace App\Controller;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\AST\Functions\CurrentDateFunction;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends AbstractController
{

    public function show(EntityManagerInterface $em, int $id) : Response{




        $product = $em->getRepository(Product::class)->active($id);

        return $this->render('product/show.html.twig', [
            'product' => $product ]);






    }

}