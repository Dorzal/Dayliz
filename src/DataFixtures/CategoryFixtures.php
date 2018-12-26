<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 26/12/2018
 * Time: 23:25
 */

namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {


        $category = new Category();

        $category->setName('Technologie');
        $category->setLogo('memememe.jpg');

        $manager->persist($category);

        $manager->flush();

        $categor = new Category();

        $categor->setName('Mode');
        $categor->setLogo('memememe.jpg');

        $manager->persist($categor);

        $manager->flush();

        $catego = new Category();

        $catego->setName('Deco');
        $catego->setLogo('memememe.jpg');

        $manager->persist($catego);

        $manager->flush();

        $categ = new Category();

        $categ->setName('Influenceur');
        $categ->setLogo('memememe.jpg');

        $manager->persist($categ);

        $manager->flush();
    }

}