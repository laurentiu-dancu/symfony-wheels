<?php

namespace BlogBundle\Form;

use BlogBundle\Entity\Contact;
use BlogBundle\Form\EventListener\ContactEventListener;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', null, [
                'label' => 'Name',
            ])
            ->add('lastName', null, [
                'label' => 'Surname',
            ])
            ->add('email')
            ->add('content')
            ->add('save', SubmitType::class, ['label' => 'Contact'])
            ->addEventListener(FormEvents::PRE_SET_DATA, [$this, 'onPreSetData'])
            ->addEventSubscriber(new ContactEventListener());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
    }

    public function onPreSetData(FormEvent $event)
    {
        $form = $event->getForm();
        $form->add(
            'random',
            TextType::class,
            [
                'mapped' => false,
                'label' => 'Sometimes it appears and sometime it doesn\'t',
                'data' => 'Anyways, it does nothing.',
            ]
        );
    }
}
