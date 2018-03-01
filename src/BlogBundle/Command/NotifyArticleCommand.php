<?php

namespace BlogBundle\Command;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class NotifyArticleCommand extends ContainerAwareCommand {


    protected function configure()
    {
        $this
            ->setName('blog:notify-article')
            ->setDescription('Notifies subscribers about a new article');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $mailer = $this->getContainer()->get('mailer');
        $renderer = $this->getContainer()->get('twig');
        $user_repository = $em->getRepository(User::class);
        $users = $user_repository->getSubscribedUsers();

        $article_repository = $em->getRepository(Article::class);
        $articles = $article_repository->getArticlesToDispatch();

        $output->writeln('Dispatching ' . count($articles) . ' articles to ' . count($users) . ' users...' );

        foreach ($articles as $article) {
            if ($article instanceof Article) {
                foreach ($users as $user) {
                    if ($user instanceof User) {
                        $message = \Swift_Message::newInstance()
                            ->setSubject('New Article: ' . $article->getTitle())
                            ->setFrom('laue.dancu' . '@' . 'gmail.com')
                            ->setTo($user->getEmail())
                            ->setBody(
                                $renderer->render(
                                    '@Blog/Emails/article.html.twig',
                                    [
                                        'article' => $article,
                                        'contact' => $user,
                                    ]
                                ),
                                'text/html'
                            );

                        $mailer->send($message);
                    }
                }
                $article->setDispatched(true);
                $em->persist($article);
                $em->flush();
            }
        }
    }
}
