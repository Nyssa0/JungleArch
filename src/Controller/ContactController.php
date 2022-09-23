<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Repository\OpeningRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(OpeningRepository $openingRepository, Request $request, ContactRepository $contactRepository, EntityManagerInterface $em): Response
    {

        $openings = $openingRepository->find(1);

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $contact_data = $form->getData();
            
            $em->persist($contact_data);
            $em->flush();

            // ... perform some action, such as saving the task to the database
            return $this->redirectToRoute('app_contact');
        }


        return $this->render('contact/index.html.twig', [
            'openings' => $openings,
            'form' => $form->createView()
        ]);
    }
}
