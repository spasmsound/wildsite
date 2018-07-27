<?php

namespace App\Controller;


use App\Entity\Tour;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TourController extends AbstractController
{
    /**
     * @Route("/tour/", name="app_tour_page")
     */
    public function index(EntityManagerInterface $em)
    {

        $repository = $em->getRepository(Tour::class);
        $articles = $repository->findAll();

        return $this->render('tour.html.twig',
            [
                'articles' => $articles
            ]);

    }
}