<?php

namespace App\Controller;

use App\Entity\Videos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VideosController extends AbstractController
{

    /**
     * @Route("/videos/", name="videos_page")
     */
    public function show(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Videos::class);
        $videos = $repository->findAll();

        return $this->render('videos.html.twig',
            [
                'videos' => $videos
            ]);
    }

}