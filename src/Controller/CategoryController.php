<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 19/12/2018
 * Time: 22:36
 */

namespace App\Controller;

use App\Entity\Category;
use App\Form\InterestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class CategoryController extends AbstractController
{

    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function index(EntityManagerInterface $em)
    {

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_USER');
        $category = $em->getRepository(Category::class)->findAll();
        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }

    public function addCategoryToFavoritesInterest(Request $request, EntityManagerInterface $em) {
        $user = $this->security->getUser();
        $category = new Category();
        $form = $this->createForm(InterestType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $category->getUsersFav()->add($user);
            $user->getFavoritesInterests()->add($category);
            $em->flush();
        }

        return $this->render(
            'registration/interest.html.twig',
            array('form' => $form->createView())
        );
    }




}

