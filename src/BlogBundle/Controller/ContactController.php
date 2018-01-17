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

            return $this->redirectToRoute('blog_homepage');
        }

        return $this->render('@Blog/Contact/contactCreate.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
