<?php

namespace App\Helper;

use App\Entity\Videos;
use Doctrine\ORM\EntityManagerInterface;

class VideoHelper
{

    private $basicLinks;
    private $htmlLinks;

    public function __construct(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Videos::class);
        $videos = $repository->findAll();

        $this->basicLinks = [];

        foreach ($videos as $video) {
            $this->basicLinks[] = $video->getLink();
        }
    }

    public function getBasicLinks()
    {
        return $this->basicLinks;
    }

    public function getHtmlLinks()
    {
        $parts = [];
        foreach ($this->basicLinks as $link) {
            $parts[] = explode('=', $link);
        }

        $linksId = [];
        foreach ($parts as $value) {
            $linksId[] = $value[1];
        }

        $this->htmlLinks = [];
        foreach ($linksId as $value) {
            $this->htmlLinks[] = 'https://www.youtube.com/embed/' . $value .'?ecver=2';
        }

        return $this->htmlLinks;
    }

}
