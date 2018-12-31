<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 19/12/2018
 * Time: 22:36
 */

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{



    public function index(EntityManagerInterface $em)
    {

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_USER');
        $category = $em->getRepository(Category::class)->findAll();
        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }





}

