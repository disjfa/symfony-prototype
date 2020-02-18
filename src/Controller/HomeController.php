<?php

namespace App\Controller;

use App\Faker\ImageFaker;
use App\Faker\NewsFaker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_index")
     * @param NewsFaker $newsFaker
     * @param ImageFaker $imageFaker
     * @return Response
     */
    public function index(NewsFaker $newsFaker, ImageFaker $imageFaker)
    {
        return $this->render('home/index.html.twig', [
            'news' => $newsFaker->get(3),
            'images' => $imageFaker->get(),
        ]);
    }
}
