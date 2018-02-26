<?php

namespace BlogBundle\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ArticleEventListener implements EventSubscriberInterface {

    public static function getSubscribedEvents()
    {
        return [
            FormEvents::SUBMIT   => 'onSubmit',
        ];
    }

    public function onSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $content = $data->getContent();

        // Fara mame.
        $content = str_replace('mata', 'm**a', $content);
        $data->setContent($content);
    }
}
