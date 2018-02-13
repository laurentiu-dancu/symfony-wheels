<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\ArticleCategory;
use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Annotations;

class RestController extends FOSRestController {
    public function getCategoriesAction() {
        $repo = $this->getDoctrine()->getManager()->getRepository(ArticleCategory::class);
        $data = $repo->findAll();
        $view = $this->view($data, 200);
        $context = $view->getContext();

        $context->addGroups(['Default']);
        $view->setContext($context);

        return $this->handleView($view);
    }

    public function getArticlesAction(Request $request) {
        $currentPageNr = $request->query->getInt('page', 1);
        $currentPageLimit = $request->query->getInt('limit', ArticleController::PAGINATION_LIMITS[1]);

        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);
        $data = $repo->getPaginated($currentPageNr, $currentPageLimit);
        $view = $this->view($data, 200);
        $context = $view->getContext();

        $context->addGroups(['Default']);
        $view->setContext($context);

        return $this->handleView($view);
    }

    /**
     * @param Article $article
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getArticleAction(Article $article) {
        $view = $this->view($article, 200);
        $context = $view->getContext();

        $context->addGroups(['Default', 'detail']);
        $view->setContext($context);

        return $this->handleView($view);
    }
}
