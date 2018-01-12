<?php

namespace BlogBundle\DataFixtures\ORM;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\ArticleCategory;
use BlogBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture {

    protected $users = [
        ['Tianna', 'Ziemann', 'Rubye76@hotmail.com', '2Z^@FxLpH>?R4Us'],
        ['Wanda', 'Koelpin', 'oJohns@Kiehn.com', 'yk63d|3a]bQsrunw0{'],
        ['Clifford', 'Beier', 'Heath58@Harris.org', 'Lk>40G|$7['],
        ['Estella', 'Rogahn', 'Pierce22@hotmail.com', 'TR]u<*d'],
        ['Camden', 'Ledner', 'Hane.Christina@Vandervort.com', 'OW&VHZqzXf=6tSGz'],
        ['Joyce', 'McClure', 'Runolfsson.Vernice@yahoo.com', 'Qk&|X+*KrK.*2[ZSoA'],
        ['Lydia', 'Hegmann', 'Nienow.Sarai@hotmail.com', '[]g]A7:Bug'],
        ['Aurore', 'Wintheiser', 'Geovanny07@Buckridge.info', '\'KBH&G'],
        ['Odell', 'Ruecker', 'Marvin.Zelma@Fay.com', '`WM!t<]M'],
        ['Omer', 'Mueller', 'bRempel@Sipes.com', '!xnR-f&mbSx68P']
    ];

    protected $articles = [
        [2, 'Article 1', 'Et ab quo voluptatum quia ipsum voluptatibus est. Eveniet aut atque possimus. Dolores quis totam incidunt ducimus.\nEst quia assumenda minima sunt. Similique ut culpa natus consequatur reiciendis sit.', 'http://placehold.it/300x300'],
        [3, 'Article 2', 'Architecto quod nulla maxime voluptas. Inventore esse harum accusantium rerum nulla voluptatem voluptas. Quos sed autem voluptatibus eum aut nesciunt.', 'http://placehold.it/300x300'],
        [1, 'Article 3', 'Autem non non explicabo et. Itaque ex quaerat ut aut. Consequatur non rerum in cupiditate voluptas molestiae fuga. Cum non qui quaerat cupiditate incidunt id sunt.', 'http://placehold.it/300x300'],
        [2, 'Article 4', 'Omnis molestiae consequatur sint consequatur est. Doloremque aperiam qui rerum accusamus beatae. Enim et doloribus voluptatibus perspiciatis. Sapiente quia suscipit doloribus. Dolorem saepe libero quas magni rerum consequatur.', 'http://placehold.it/300x300'],
        [2, 'Article 5', 'Velit eius similique dolore. Et ipsam omnis saepe dolor in perspiciatis sit. Temporibus voluptate laborum hic hic. Culpa rerum soluta in dicta molestiae asperiores consequuntur sit. Dolorum aliquam doloremque et reprehenderit nesciunt eum non.', 'http://placehold.it/300x300'],
        [1, 'Article 6', 'Ad in maiores nisi eius quibusdam sapiente quia. Aut numquam laboriosam sint enim reiciendis quod ullam at. Non eos sed amet sunt vitae enim.', 'http://placehold.it/300x300'],
        [2, 'Article 7', 'Quo incidunt omnis aut enim nihil repellat ut. Dolore rem est est alias neque autem. Esse repudiandae pariatur reprehenderit assumenda error consequatur fugit. Iste minus ullam quidem quo.', 'http://placehold.it/300x300'],
        [3, 'Article 8', 'Nulla totam eos omnis inventore perferendis voluptatem nisi. Consequatur ullam voluptas et tempora. Corporis excepturi sint dolores quaerat odit quia nisi accusantium.', 'http://placehold.it/300x300'],
        [2, 'Article 9', 'Est dolores consectetur odio facere. Modi consequatur dicta ipsa temporibus sit. Cupiditate doloremque odio ad asperiores quaerat eius accusamus. Dolorem earum ut consequatur facilis molestias quo.', 'http://placehold.it/300x300'],
        [2, 'Article 10', 'Est quod alias iste similique aut. Pariatur et libero explicabo quia sed ea. Unde voluptatem tempora beatae. Eum est molestiae et laboriosam.\nOmnis vel excepturi similique quia. Beatae et nam itaque nesciunt fugit ea. Temporibus qui ad est.', 'http://placehold.it/300x300']
    ];

    public function load(ObjectManager $manager)
    {
        foreach ($this->users as $userArray) {
            $user = new User();
            $user->setFirstName($userArray[0]);
            $user->setLastName($userArray[1]);
            $user->setEmail($userArray[2]);
            $user->setPassword($userArray[3]);
            $manager->persist($user);
        }

        $category1 = new ArticleCategory();
        $category1->setName('IT');
        $category2 = new ArticleCategory();
        $category2->setName('Literature');
        $category3 = new ArticleCategory();
        $category3->setName('Science');
        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->flush();

        $categories = [1 => $category1, 2 => $category2, 3 => $category3];
        foreach ($this->articles as $articleArray) {
            $article = new Article();
            $article->setCategory($categories[$articleArray[0]]);
            $article->setTitle($articleArray[1]);
            $article->setContent($articleArray[2]);
            $article->setImage($articleArray[3]);
            $manager->persist($article);
        }
        $manager->flush();
    }
}