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
        $data = json_decode($articles_response->getContent(), TRUE);

        return $this->render('base.html.twig', ['props' => ['articleList' => $data['articles'], 'totalPages' => $data['totalPages']]]);
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
