<?php

namespace BlogBundle\Admin;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\ArticleCategory;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', ['class' => 'col-md-9'])
            ->add('title', TextType::class)
            ->add(
                'content'
            )->add(
                'imageFile',
                VichImageType::class,
                [
                    'required' => false,
                ]
            )->end();

        $formMapper
            ->with('META', ['class' => 'col-md-3'])
            ->add(
                'category',
                ModelType::class,
                [
                    'class' => ArticleCategory::class,
                    'property' => 'name',
                ]
            )
            ->add(
                'langcode',
                ChoiceType::class,
                [
                    'label' => 'Language',
                    'choices' => [
                        'ENglish' => 'en',
                        'ROmaneste' => 'ro',
                    ],
                ]
            )
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('category.name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
        ->add('category');
    }

    public function toString($object)
    {
        return $object instanceof Article
            ? $object->getTitle()
            : 'Blog Post';
    }

}
