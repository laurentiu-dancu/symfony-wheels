<?php

namespace BlogBundle\Twig;

use BlogBundle\Entity\ArticleCategory;
use Doctrine\ORM\EntityManagerInterface;

class CategoriesExtension extends \Twig_Extension {
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('categories', [$this, 'getCategories']),
        ];
    }

    public function getCategories() {
        $repo = $this->entityManager->getRepository(ArticleCategory::class);
        $categories = $repo->getFormatted();

        return ($categories);
    }
}
