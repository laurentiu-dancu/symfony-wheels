<?php

namespace BlogBundle\Form;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\ArticleCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ArticleType extends AbstractType {
    const MAX_TITLE_LENGTH = 50;
    const MAX_CONTENT_LENGTH = 2000;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
            'label' => 'Article title',
            'label_attr' => ['class' => 'label label-success'],
            'attr' => [
                'maxlength' => static::MAX_TITLE_LENGTH,
            ],
            'constraints' => [
                new NotBlank(),
                new Length([
                    'max' => self::MAX_TITLE_LENGTH,
                    'maxMessage' => sprintf(
                        'Article title cannot be longer than %s characters',
                        self::MAX_TITLE_LENGTH
                    )
                ])
            ],
        ])
            ->add('content', null, [
                'constraints' => [
                    new Length([
                        'max' => self::MAX_CONTENT_LENGTH,
                        'maxMessage' => sprintf(
                            'Article content cannot be longer than %s characters',
                            self::MAX_CONTENT_LENGTH
                        )
                    ])
                ],
            ])
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
