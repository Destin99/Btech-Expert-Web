<?php

namespace App\Controller;

use App\Entity\Actuallite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualliteController extends AbstractController
{
    
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/actuallite', name: 'actualite')]
    public function index(): Response
    {
        $actual = $this->entityManager->getRepository(Actuallite::class)->findByStatut(1);

        return $this->render('actuallite/index.html.twig', [
            'actualy' => $actual,
        ]);
    }
}
