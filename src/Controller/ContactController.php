<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {

        $contact = new Contact();
        $nom=$request->request->get('name');
            $objet =$request->request->get('objet');
            $msg = $request->request->get('message');
            $mail = $request->request->get('email');

        if ($request->isMethod('POST')) {
            $contact->setName($request->request->get('name'));
            $contact->setObjet($request->request->get('objet'));
            $contact->setMessage($request->request->get('message'));
            $contact->setEmail($request->request->get('email'));

            $email = (new Email())
                ->from($mail)
                ->to('promailjet@gmail.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject($objet)
                ->text($msg);
            $mailer->send($email);
            

            $this->entityManager->persist($contact);
            $this->entityManager->flush();
            $this->addFlash('notice', 'Merci de nous avoir contacté. Notre équipe va vous répondre dans les meilleurs délais.');

        }
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
