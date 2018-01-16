<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\ArticleCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends Controller
{
    const PAGINATION_LIMITS = [2, 5, 10, 20];
    const MAX_TITLE_LENGTH = 50;

    public function indexAction()
    {
        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);
        $request = Request::createFromGlobals();

        $currentPageNr = $request->query->getInt('page', 1);
        $currentPageLimit = $request->query->getInt('limit', static::PAGINATION_LIMITS[1]);

        if (!in_array($currentPageLimit, static::PAGINATION_LIMITS)) {
            return $this->redirectToRoute('blog_homepage');
        }

        $totalPages = ceil($repo->countArticles() / $currentPageLimit);

        if ($currentPageNr < 1 || $currentPageNr > $totalPages) {
            return $this->redirectToRoute('blog_homepage');
        }


        $repo = $this->getDoctrine()->getManager()->getRepository(Article::class);

        $articles = $repo->getPaginated($currentPageNr, $currentPageLimit);

        return $this->render(
            '@Blog/Article/articleList.html.twig',
            [
                'articles' => $articles,
                'currentLimit' => $currentPageLimit,
                'limits' => static::PAGINATION_LIMITS,
                'currentPage' => $currentPageNr,
                'totalPages' => $totalPages,
                'paginationRouteName' => 'blog_homepage',
                'paginationRouteParams' => [],
            ]
        );
    }

    public function detailAction(Article $article)
    {
        return $this->render('@Blog/Article/articleDetail.html.twig', [
            'article' => $article
        ]);
    }

    public function createAction(Request $request)
    {
        $article = new Article();
        $form = $this->createFormBuilder($article)
            ->add('title', null, [
                'label' => 'Article title',
                'label_attr' => ['class' => 'label label-success'],
                'attr' => [
                    'maxlength' => static::MAX_TITLE_LENGTH,
                ],
            ])
            ->add('content')
            ->add('category', EntityType::class, [
                'class' => ArticleCategory::class,
            ])
            ->add('save', SubmitType::class, ['label' => 'Publish'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('blog_homepage');
        }

        return $this->render('@Blog/Article/articleCreate.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function deleteAction(Article $article)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute('blog_homepage');
    }
}
