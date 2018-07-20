<?php

namespace App\Controller;

use App\Helper\VideoHelper;
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
        $helper = new VideoHelper($em);
        $videos = $helper->getHtmlLinks();

        return $this->render('videos.html.twig',
            [
                'videos' => $videos
            ]);
    }

}