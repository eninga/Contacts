<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Contact;
use UserBundle\Form\Type\ContactType;

/**
 * Description of Users
 *
 * @author eningabiye
 */
class UsersController extends Controller {

    public function getContactsAction() {
        $user = $this->getUser();
        $contacts = $this->getDoctrine()->getRepository('UserBundle:Contact')->findByAuteur($user);
        return $this->render('UserBundle:User:contacts.html.twig', array('contacts' => $contacts));
    }

    public function getContactAction($id) {
        $user = $this->getUser();
        $contact = $this->getDoctrine()->getRepository('UserBundle:Contact')->find($id);
        if (!$contact) {
            $this->addFlash(
                    'notice-warn', 'Ce contact ne fait pas partie de votre carnet d\'adresse'
            );
            return $this->redirectToRoute("user_contacts");
        }
        if ($contact->getAuteur() != $user) {
            $this->addFlash(
                    'notice-warn', 'Ce contact ne fait pas partie de votre carnet d\'adresse'
            );
            return $this->redirectToRoute("user_contacts");
        }
        return $this->render('UserBundle:User:contact.html.twig', array('contact' => $contact));
    }

    public function postContactAction(Request $request, $id = null) {
        $contact = null;
        if ($id == null) {
            $contact = new Contact();
        } else {
            $contact = $this->getDoctrine()->getRepository('UserBundle:Contact')->find($id);
        }
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setAuteur($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            $message = $id == null ? "ajouté!":"modifié!";
            $this->addFlash(
                    'notice', 'Votre contact a été '.$message
            );
            return $this->redirectToRoute("user_contacts");
        }
        return $this->render('UserBundle:User:ajoutContact.html.twig', array('form' => $form->createView()));
    }

    public
            function deleteContactAction($id) {
        $user = $this->getUser();
        $contact = $this->getDoctrine()->getRepository('UserBundle:Contact')->find($id);
        if (!$contact) {
            throw $this->createNotFoundException("Ce contact n'existe pas");
        }
        if ($contact->getAuteur() != $user) {
            throw $this->createAccessDeniedException('Ce contact ne fait pas partie de votre carnet d\'adresse');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($contact);
        $em->flush();
        $this->addFlash(
                'notice-warn', 'Votre contact a été supprimé!!'
        );
        return $this->redirectToRoute("user_contacts");
    }

}
