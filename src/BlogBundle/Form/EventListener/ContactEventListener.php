<?php

namespace BlogBundle\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ContactEventListener implements EventSubscriberInterface {

    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SUBMIT   => 'onPreSubmit',
        ];
    }

    public function onPreSubmit(FormEvent $event)
    {
        $data = $event->getData();
    }
}
