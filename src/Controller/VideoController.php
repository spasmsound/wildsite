<?php

namespace App\Controller;

use App\Entity\Videos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class VideoController
 * @package App\Controller
 */
class VideoController extends AbstractController
{
    /**
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/videos/", name="app_videos_page")
     */
    public function index(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Videos::class);
        $videos = $repository->findAll();

        return $this->render('videos.html.twig',
            [
                'videos' => $videos
            ]);
    }

}