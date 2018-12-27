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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends AbstractController
{

    public function show(EntityManagerInterface $em, int $id) : Response{

        $product = $em->getRepository(Product::class)->activeByCategory($id);

        return $this->render('product/show.html.twig', [
            'product' => $product ]);

    }

    public function showAll(EntityManagerInterface $em): Response {

        $product = $em->getRepository(Product::class)->active();
        return $this->render('product/showall.html.twig', [
            'product' => $product
        ]);
    }

    public function showProduct(EntityManagerInterface $em, int $id): Response {

        $product = $em->getRepository(Product::class)->find($id);
        return $this->render('product/show.html.twig', [
            'product' => $product ]);

    }

}