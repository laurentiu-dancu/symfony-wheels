<?php

namespace BlogBundle\EventSubscriber;

use BlogBundle\Event\UserRegisteredEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Twig\Environment;

class UserRegisteredSubscriber implements EventSubscriberInterface {
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    protected $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $twig)
    {
        $this->mailer = $mailer;
        $this->renderer = $twig;
    }

    public static function getSubscribedEvents()
    {
        return [
            UserRegisteredEvent::NAME => [
                'onUserRegister',
            ]
        ];
    }

    public function onUserRegister(UserRegisteredEvent $event) {
        $user = $event->getUser();

            $message = \Swift_Message::newInstance()
                ->setSubject('Contact Email')
                ->setFrom('laue.dancu' . '@' . 'gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderer->render(
                        '@Blog/Emails/register.html.twig',
                        array('contact' => $user)
                    ),
                    'text/html'
                );
            $this->mailer->send($message);

    }

}
