<?php

namespace BlogBundle\Form;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\ArticleCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType {
    const MAX_TITLE_LENGTH = 50;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
            'label' => 'Article title',
            'label_attr' => ['class' => 'label label-success'],
            'attr' => [
                'maxlength' => static::MAX_TITLE_LENGTH,
            ],
        ])
            ->add('content')
            ->add('category', EntityType::class, [
                'class' => ArticleCategory::class,
            ])
            ->add('save', SubmitType::class, ['label' => 'Publish']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class
        ]);
    }
}
