<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Article::class);
        $articles = $repository->findAll();

        return $this->render(
            'homepage.html.twig',
            [
                'articles' => $articles,
            ]
        );
    }

    /**
     * @Route("/news/{article}", name="article_show")
     * @param Article $article
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Article $article)
    {
        return $this->render(
            'article.html.twig',
            [
                'article' => $article,
            ]
        );
    }

}