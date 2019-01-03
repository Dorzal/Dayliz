<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 31/12/2018
 * Time: 08:26
 */

namespace App\Controller;


use App\Entity\Category;
use App\Entity\Product;
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


    public function addCategoryToFavoritesInterest(Request $request, EntityManagerInterface $em,int $id ) {
        $user = $em->getRepository(User::class)->find($id);
        $form = $this->createForm(InterestType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('show_by_interest');
        }

        return $this->render(
            'registration/interest.html.twig',
            array('form' => $form->createView())
        );
    }

    public function likeProduct(Request $request, EntityManagerInterface $em) {


        $user_id = $request->request->get('user_id');
        $product_id = $request->request->get('product_id');

        $user = $em->getRepository(User::class)->find($user_id);
        $product =$em->getRepository(Product::class)->find($product_id);


            $user->getLikes()->add($product);
            $em->flush();

    }



}