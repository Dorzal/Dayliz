<?php
/**
 * Created by PhpStorm.
 * User: alinder
 * Date: 27/12/2018
 * Time: 10:17
 */

namespace App\DataFixtures;

use App\Entity\Mark;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MarkFixtures extends Fixture {

    public function load(ObjectManager $manager)
    {


        $mark = new Mark();

        $mark->setName('apple');


        $manager->persist($mark);

        $manager->flush();


        $mar = new Mark();

        $mar->setName('sony');

        $manager->persist($mar);

        $manager->flush();


        $ma = new Mark();

        $ma->setName('universal');


        $manager->persist($ma);

        $manager->flush();

        $m = new Mark();

        $m->setName('dyson');


        $manager->persist($m);

        $manager->flush();
    }

}