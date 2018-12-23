<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 21/12/2018
 * Time: 22:04
 */

namespace App\Controller;


use App\Entity\Category;
use App\Entity\Interest;
use App\Form\InterestType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class InterestCategoryController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function interest(Request $request, EntityManagerInterface $em)
    {
        $category = new Category();
        $form = $this->createForm(InterestType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $interest = new Interest();
            var_dump($form);
            die();
            $interest->setCategoryId($data);
            $em->persist($interest);
            $em->flush();
        }

        return $this->render('Registration/interest.html.twig', [
            'form' => $form->createView()
        ]);



    }

}