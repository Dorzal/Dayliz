<?php
/**
 * Created by PhpStorm.
 * User: Vhely
 * Date: 26/02/2019
 * Time: 22:37
 */

namespace App\DataFixtures;


use App\Entity\SubCategory;
use Doctrine\Common\Persistence\ObjectManager;

class SubCategoryFixtures
{

    public function load(ObjectManager $manager) {

        $sb = new SubCategory();

        $sb->setName('sous-categorie');
        $sb->setLogo('wwww.jpg');

        $manager->persist($sb);
        $manager->flush();

    }

}