<?php

namespace App\Controller;

use App\Entity\Banner;
use App\Entity\Client;
use App\Entity\NosService;
use App\Entity\ProposNous;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $banner = $this->entityManager->getRepository(Banner::class)->findByStatus(1);
        $service = $this->entityManager->getRepository(NosService::class)->findByStatut(1);
        $client = $this->entityManager->getRepository(Client::class)->findByStatut(1);
        $about = $this->entityManager->getRepository(ProposNous::class)->findByStatutLimit(1);

        return $this->render('home/index.html.twig', [
            'banners' => $banner,
            'services' => $service,
            'clients'=> $client,
            'abouts'=> $about,
        ]);
    }
}
