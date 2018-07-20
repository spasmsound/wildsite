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

        return $this->render('homepage.html.twig',
            [
                'articles' => $articles
            ]);
    }

    /**
     * @Route("/news/{id}", name="article_show")
     */
    public function show($id, EntityManagerInterface $em)
    {

        $repository = $em->getRepository(Article::class);
        $article = $repository->findOneBy(['id' => $id]);
        if(!$article) {
            throw $this->createNotFoundException('Нет новости по ' . $id);
        }
        return $this->render('article.html.twig',
            [
                'article' => $article
            ]);
    }

}