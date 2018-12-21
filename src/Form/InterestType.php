<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 20/12/2018
 * Time: 22:58
 */

namespace App\Form;


use App\Entity\User;
use Sonata\Form\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('categorys', CollectionType::class, array(
            'entry_type' => CategoryType::class,

        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }
}