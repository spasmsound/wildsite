<?php

namespace App\Controller;

use App\Entity\Tour;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TourController
 * @package App\Controller
 */
class TourController extends AbstractController
{
    /**
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/tour/", name="app_tour_page")
     */
    public function index(EntityManagerInterface $em)
    {

        $repository = $em->getRepository(Tour::class);
        $tours = $repository->findAll();

        return $this->render('tour.html.twig',
            [
                'tours' => $tours
            ]
        );
    }
}