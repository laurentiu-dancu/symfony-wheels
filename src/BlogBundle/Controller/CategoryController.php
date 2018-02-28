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
        $restController = $this->get(RestController::class);
        if ($category) {
            $request->query->add([
                'category' => $category->getId(),
            ]);
        }

        $articles_response = $restController->getArticlesAction($request);
        $data = json_decode($articles_response->getContent(), TRUE);

        return $this->render('base.html.twig', ['props' => $data]);
    }
}
