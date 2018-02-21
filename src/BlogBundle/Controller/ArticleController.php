<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Serializer;

class ArticleController extends Controller
{
    const PAGINATION_LIMITS = [2, 5, 10, 20];


    public function indexAction(Request $request)
    {
        $restController = $this->get(RestController::class);
        $articles_response = $restController->getArticlesAction($request);
        $articles = json_decode($articles_response->getContent());

        return $this->render('base.html.twig', ['props' => ['articleList' => $articles]]);
//        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);
//
//        $currentPageNr = $request->query->getInt('page', 1);
//        $currentPageLimit = $request->query->getInt('limit', static::PAGINATION_LIMITS[1]);
//
//        if (!in_array($currentPageLimit, static::PAGINATION_LIMITS)) {
//            return $this->redirectToRoute('blog_homepage');
//        }
//
//        $totalPages = ceil($repo->countArticles() / $currentPageLimit);
//
//        if ($currentPageNr < 1 || $currentPageNr > $totalPages) {
//            return $this->redirectToRoute('blog_homepage');
//        }
//
//
//        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);
//
//        $encoders = [new JsonEncoder()];
//        $normalizers = [new JsonSerializableNormalizer];
//        $serializer = new Serializer($normalizers, $encoders);
//
//        $articles = $repo->getPaginated($currentPageNr, $currentPageLimit);
//        $jsonArticles = $serializer->normalize(['articles' => $articles]);
//        // End react stuff.
//
//        return $this->render(
//            '@Blog/Article/articleListReact.html.twig',
//            [
//                'articles' => $articles,
//                'props' => $jsonArticles,
//                'currentLimit' => $currentPageLimit,
//                'limits' => static::PAGINATION_LIMITS,
//                'currentPage' => $currentPageNr,
//                'totalPages' => $totalPages,
//                'paginationRouteName' => 'blog_homepage',
//                'paginationRouteParams' => [],
//            ]
//        );
    }

    public function detailAction(Request $request, Article $article)
    {
//        $comment = new Comment();
//        $form = $form = $this->createForm(CommentType::class, $comment);
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $parentId = $form->get('parentId')->getData();
//            if ($parentId) {
//                $parent = $em->find(Comment::class, $parentId);
//                $comment->setParent($parent);
//            }
//            $user = $request->getUser();
//            if ($user) {
//                $comment->setUser($user);
//            }
//            $comment->setArticle($article);
//
//            $em->persist($comment);
//            $em->flush();
//
//            $this->addFlash(
//                'notice',
//                'Your comment was saved!'
//            );
//
//            return $this->redirectToRoute('article_detail', ['id' => $article->getId()]);
//        }

//        return $this->render('@Blog/Article/articleDetail.html.twig', [
//            'article' => $article,
//            'form' => $form->createView(),
//        ]);
        $restController = $this->get(RestController::class);
        $articles_response = $restController->getArticleAction($article);
        $article = json_decode($articles_response->getContent());

        return $this->render('base.html.twig', [
            'props' => ['article' => $article],
        ]);
    }

    public function createAction(Request $request, Article $article = null)
    {
        $article = $article ?: new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_detail', ['id' => $article->getId()]);
        }

        return $this->render('@Blog/Article/articleCreate.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function deleteAction(Article $article)
    {
        $em = $this->getDoctrine()->getManager();

        $article->setDeleted(true);
        $em->persist($article);
        $em->flush();

        return $this->redirectToRoute('blog_homepage');
    }

}
