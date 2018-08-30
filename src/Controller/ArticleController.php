<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 * @package App\Controller
 */
class ArticleController extends AbstractController
{
    /**
     * @param EntityManagerInterface $em
     * @param int $page
     * @param PaginatorInterface $paginator
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(
     *     "/{page}",
     *     name="app_homepage",
     *     methods="GET",
     *     defaults={"page": 1},
     *     requirements={"page" = "\d+"})
     */
    public function homepage(
        EntityManagerInterface $em,
        int $page,
        PaginatorInterface $paginator
    ) : Response {
        $articles = $paginator->paginate(
            $em->getRepository(Article::class)->findAll(),
            $page,
            $this->getParameter('max_articles_on_page')
        );


        return $this->render('homepage.html.twig',
            [
                'articles' => $articles
            ]);
    }

    /**
     * @param Article $article
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/news/{article}", name="article_show")
     */
    public function show(Article $article)
    {
        return $this->render('article.html.twig',
            [
                'article' => $article
            ]);
    }

}