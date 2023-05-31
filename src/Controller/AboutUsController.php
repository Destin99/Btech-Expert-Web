<?php

namespace App\Controller;

use App\Entity\ProposNous;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutUsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/about/us', name: 'app_about_us')]
    public function index(): Response
    {
        $about = $this->entityManager->getRepository(ProposNous::class)->findByStatut(1);
        return $this->render('about_us/index.html.twig', [
            'abouts' => $about,
        ]);
    }
}
