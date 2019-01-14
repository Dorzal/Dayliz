<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 23/12/2018
 * Time: 00:49
 */

namespace App\Controller;


use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
use App\Form\InterestType;
use App\Repository\InterestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;


class ProductController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function show(EntityManagerInterface $em, int $id) : Response{

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_ADMIN');
        $category = $em->getRepository(Category::class)->findAll();
        $product = $em->getRepository(Product::class)->activeByCategory($id);

        return $this->render('product/show.html.twig', [
            'product' => $product,
            'category' => $category]);

    }

    public function showAll(EntityManagerInterface $em): Response {

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_ADMIN');
        $category = $em->getRepository(Category::class)->findAll();
        $product = $em->getRepository(Product::class)->active();
        return $this->render('product/showall.html.twig', [
            'product' => $product,
            'category' => $category
        ]);
    }

    public function showProduct(EntityManagerInterface $em, int $id): Response {

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE');
        $category = $em->getRepository(Category::class)->findAll();
        $product = $em->getRepository(Product::class)->focus($id);
        return $this->render('product/show.html.twig', [
            'product' => $product,
            'category' => $category
        ]);

    }

    public function showProductByInterest(EntityManagerInterface $em): Response {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE');
        $user = $this->security->getUser();
         // pas de nouvelle requête déclenché
        $test = $em->getRepository(User::class)->byInterest($user->getId());
        for($i = 0 ; $i< count($test[0]['interests']); $i++){
             $data[] = strval($test[0]['interests'][$i]['id']);
        }
        $category = $em->getRepository(Category::class)->findAll();
        $products = $em->getRepository(Product::class)->activeByInterest($data);
        return $this->render('product/showbyinterest.html.twig', [
            'products' => $products,
            'category' => $category
        ]);
    }

}