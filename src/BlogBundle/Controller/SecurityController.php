<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\User;
use BlogBundle\Event\UserRegisteredEvent;
use BlogBundle\EventSubscriber\UserRegisteredSubscriber;
use BlogBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SecurityController
 * @package Blog\BlogBundle\Controller
 */
class SecurityController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            '@Blog/Security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setRoles(['ROLE_USER']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $dispatcher = $this->container->get('event_dispatcher');
            $event = new UserRegisteredEvent($user);
            $dispatcher->dispatch(UserRegisteredEvent::NAME, $event);

            return $this->redirectToRoute('blog_homepage');
        }

        return $this->render(
            '@Blog/Security/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
