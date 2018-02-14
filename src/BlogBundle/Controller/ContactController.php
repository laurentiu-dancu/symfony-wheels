<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Contact;
use BlogBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    public function createAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $message = \Swift_Message::newInstance()
                ->setSubject('Wheels Contact Email')
                ->setFrom($contact->getEmail())
                ->setTo('laue.dancu' . '@' . 'gmail.com')
                ->setBody(
                    $this->renderView(
                        '@Blog/Emails/contact.html.twig',
                        array('contact' => $contact)
                    ),
                    'text/html'
                );

            $this->get('mailer')->send($message);

            return $this->redirectToRoute('blog_homepage');
        }

        return $this->render('@Blog/Contact/contactCreateReact.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
