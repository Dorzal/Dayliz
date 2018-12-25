<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 22/12/2018
 * Time: 00:30
 */

namespace App\Form;


use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class InterestType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('mode', CheckboxType::class, array(
            'label'    => 'Mode',
            'required' => false,
        ));
        $builder->add('voiture', CheckboxType::class, array(
            'label'    => 'Voiture',
            'required' => false,
        ));
        $builder->add('technologie', CheckboxType::class, array(
            'label'    => 'Technologie',
            'required' => false,
        ));



    }

}