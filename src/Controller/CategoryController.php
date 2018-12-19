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
    public function interest(EntityManagerInterface $em){
        $category = $em->getRepository(Category::class)->findAll();
        return $this->render('Register/interest.html.twig', [
            'category' => $category,
        ]);
    }

}