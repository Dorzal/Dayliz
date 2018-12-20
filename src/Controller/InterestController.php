<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 20/12/2018
 * Time: 22:55
 */

namespace App\Controller;


use App\Entity\Category;
use App\Entity\User;
use App\Form\InterestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class InterestController extends AbstractController
{

    public function knowInterest(Request $request){
        $user = new User();
        $category = new Category();
        $user->getCategorys()->add($category);
        $form = $this->createForm(InterestType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $result = $form->getData();
            $em->persist($result);
            $em->flush();
            // ... maybe do some form processing, like saving the Task and Tag objects

        }


        return $this->render(
            'registration/know_interest.html.twig',
            array('form' => $form->createView())
        );
    }

}