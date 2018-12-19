<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 18/12/2018
 * Time: 23:31
 */

namespace App\Admin;


use App\Entity\Category;
use App\Entity\Mark;
use App\Entity\Product;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('category', EntityType::class, [
            'class' => Category::class,
            'choice_label' => 'name',
        ])
        ;
        $formMapper->add('mark', EntityType::class, [
            'class' => Mark::class,
            'choice_label' => 'name',
        ])
        ;
        $formMapper->add('name', TextType::class);
        $formMapper->add('image', TextType::class);
        $formMapper->add('describe', TextareaType::class);
        $formMapper->add('link', TextType::class);
        $formMapper->add('date', DateType::class);
    }


    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('category.name');
        $listMapper->addIdentifier('mark.name');
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('image');
        $listMapper->addIdentifier('describe');
        $listMapper->addIdentifier('link');
        $listMapper->addIdentifier('date');
    }

    public function toString($object)
    {
        return $object instanceof Product
            ? $object->getName()
            : 'Produit'; // shown in the breadcrumb on the create view
    }

}