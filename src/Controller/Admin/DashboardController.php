<?php

namespace App\Controller\Admin;

use App\Faker\NewsFaker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_dashboard_index")
     * @param NewsFaker $newsFaker
     * @return Response
     */
    public function dashboard(NewsFaker $newsFaker)
    {
        return $this->render('admin/dashboard/dashboard.html.twig', [
            'news' => $newsFaker->get(3)
        ]);
    }
}
