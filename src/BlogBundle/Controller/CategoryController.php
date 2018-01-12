<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\ArticleCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller {
    public function _categoryMenuAction() {
        $repo = $this->getDoctrine()->getManager()->getRepository(ArticleCategory::class);
        $categories = $repo->findAll();

        return $this->render(
            '@Blog/Category/_categoryMenu.html.twig',
            [
                'categories' => $categories
            ]
        );
    }

    public function listAction(ArticleCategory $category) {
        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);
        $articles = $repo->findBy(['category' => $category]);

        return $this->render(
            '@Blog/Article/articleList.html.twig',
            [
                'articles' => $articles
            ]
        );
    }
}
