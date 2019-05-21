<?php
/**
 * Created by PhpStorm.
 * User: alinder
 * Date: 27/12/2018
 * Time: 10:21
 */

namespace App\DataFixtures;


use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {

        $product = new Product();

        $product->setName('ps4');
        $product->setDescribe('On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte');
        $product->setImage('image.png');
        //todo: add reference mark and sub_category
        $product->setLink('www.link.fr');
        $product->setDate(new \DateTime());

        $manager->persist($product);
        $manager->flush();

        $produc = new Product();

        $produc->setName('deco');
        $produc->setDescribe('On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte');
        $produc->setImage('image.png');
        //todo: add reference mark and sub_category
        $produc->setLink('www.link.fr');
        $produc->setDate(new \DateTime());

        $manager->persist($produc);
        $manager->flush();

    }
}