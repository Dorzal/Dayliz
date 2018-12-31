<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 31/12/2018
 * Time: 08:26
 */

namespace App\Controller;


use App\Entity\User;
use App\Form\InterestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class UserController extends AbstractController
{

    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    public function addCategoryToFavoritesInterest(Request $request, EntityManagerInterface $em) {
        $user = new User();

        $form = $this->createForm(InterestType::class, $user);
        $category = $form->getData();
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