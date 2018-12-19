<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 18/12/2018
 * Time: 23:03
 */
namespace App\Admin;

use App\Entity\Mark;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MarkAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');

    }

    public function toString($object)
    {
        return $object instanceof Mark
            ? $object->getName()
            : 'Mark'; // shown in the breadcrumb on the create view
    }

}