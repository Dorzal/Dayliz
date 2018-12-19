<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 19/12/2018
 * Time: 22:36
 */

namespace App\Controller;
//group
use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/interest/{$this->token_storage->getToken()->getUser()->getId()}", name="interest")
     * @param Request $request
     *
     * @return Response
     */
    public function interest(Request $request, User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($user);
            $em->flush();
        }

        return new Response(
            $this->renderView(
                'register/interest.html.twig',
                array(
                    'form' => $form->createView(),
                )
            )
        );
    }
}