<?php

namespace App\Controller;

use App\Entity\NosService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NosServiceController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/nos/service', name: 'service')]
    public function index(): Response
    {
        $service = $this->entityManager->getRepository(NosService::class)->findAll();

        return $this->render('nos_service/index.html.twig', [
            'services' => $service,
        ]);
    }
}
