<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends Controller
{
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);
        $articles = $repo->findAll();

        return $this->render(
            '@Blog/Article/articleList.html.twig',
            [
                'articles' => $articles
            ]
        );
    }

    public function detailAction(Article $article)
    {
        return $this->render('@Blog/Article/articleDetail.html.twig', [
            'article' => $article
        ]);
    }
}
