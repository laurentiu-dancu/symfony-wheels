<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller {

    /**
     * @Route("/api/recipes", name="api_articles")
     *
     * Needed for client-side navigation after initial page load
     */
    public function apiArticlesAction(Request $request)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new JsonSerializableNormalizer];
        $serializer = new Serializer($normalizers, $encoders);

        $currentPageNr = $request->query->getInt('page', 1);
        $currentPageLimit = $request->query->getInt('limit', ArticleController::PAGINATION_LIMITS[1]);

        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);
        $articles = $repo->getPaginated($currentPageNr, $currentPageLimit);

        return new JsonResponse($serializer->normalize($articles));
    }

    public function apiArticleAction(Article $article, Request $request)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new JsonSerializableNormalizer];
        $serializer = new Serializer($normalizers, $encoders);

        return new JsonResponse($serializer->normalize($article));
    }
}
