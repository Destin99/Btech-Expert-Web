<?php

namespace App\Controller\Admin;

use App\Entity\Actuallite;
use App\Entity\Contact;
use App\Entity\Banner;
use App\Entity\Category;
use App\Entity\Client;
use App\Entity\NosService;
use App\Entity\ProposNous;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     
    */
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        // {{ dump("now"|date) }}"
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Btech Expert Web');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Contact', 'fas fa-comment', Contact::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Category', 'fas fa-tags', Category::class);
        yield MenuItem::linkToCrud('Nos Services', 'fas fa-file-text', NosService::class);
        yield MenuItem::linkToCrud('Image Accueil', 'fas fa-image', Banner::class);
        yield MenuItem::linkToCrud('Nos Clients', 'fas fa-list', Client::class);
        yield MenuItem::linkToCrud('Nos Actuallités', 'fas fa-file-text', Actuallite::class);
        yield MenuItem::linkToCrud('A Propos de Nous', 'fas fa-location-dot', ProposNous::class);

    }
}
