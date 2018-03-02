<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\ArticleCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    const PAGINATION_LIMITS = [2, 5, 10, 20];

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

    public function listAction(ArticleCategory $category, Request $request) {
        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);

        $currentPageNr = $request->query->getInt('page', 1);
        $currentPageLimit = $request->query->getInt('limit', static::PAGINATION_LIMITS[1]);

        if (!in_array($currentPageLimit, static::PAGINATION_LIMITS)) {
            return $this->redirectToRoute('blog_homepage');
        }

        $totalPages = ceil($repo->countArticles($category->getId()) / $currentPageLimit);

        if ($currentPageNr < 1 || $currentPageNr > $totalPages) {
            return $this->redirectToRoute('blog_homepage');
        }

        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);
        $langcode = $request->getLocale();

        $articles = $repo->getPaginated($currentPageNr, $currentPageLimit, $category->getId(), $langcode);

        return $this->render(
            '@Blog/Article/articleList.html.twig',
            [
                'articles' => $articles,
                'paginationRouteName' => 'category_list',
                'paginationRouteParams' => ['id' => $category->getId()],
                'currentLimit' => $currentPageLimit,
                'limits' => static::PAGINATION_LIMITS,
                'currentPage' => $currentPageNr,
                'totalPages' => $totalPages,
            ]
        );
    }
}
