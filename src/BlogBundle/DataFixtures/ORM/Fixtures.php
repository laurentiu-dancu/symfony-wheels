<?php

namespace BlogBundle\DataFixtures\ORM;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\ArticleCategory;
use BlogBundle\Entity\Comment;
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
        [2, 'If my Bitcoin', 'If my Bitcoin💲💰 and my girl😍👰 both drowning😱🌊 and I could only save one😤😬 Catch me HODL\'ing at my girls funeral😔👻🌹 Cuz its To The Moon or Nothing, kiddo 💰💯🔥😎📈💲', 'https://static-cdn.jtvnw.net/emoticons/v1/114836/1.0'],
        [3, 'I like spamming', 'I like spamming copypastas. It\'s my favorite activity. When they\'re dank, I think to myself "yes". When they\'re removed, I think to myself "no".', 'http://placehold.it/300x300'],
        [1, 'Dab', 'The year is 2025. MoonMoon_Ow lies on his deathbed, the countless years of oatmeal infighting finally having taken their toll. He struggles to adjust his eyes to the glare of his computer screen, yearning to view his beloved twitch chat one more time. All he sees is degenerate weeb spam. His eyes brim with tears. He begins gasping his final breath, and in his final moments he hits the hardest dab known to humanity', 'http://placehold.it/300x300'],
        [2, 'qt feed', 'wow qt is such a good guy <3 while most people are spending new years with their friends and family, this legend is feeding the hungry on the rift. much love brother and happy new year.', 'http://placehold.it/300x300'],
        [2, '𝕤𝕡𝕖𝕔𝕚𝕒𝕝', 'T𝕙𝕚𝕤 𝕚𝕤 𝕒 𝕤𝕡𝕖𝕔𝕚𝕒𝕝 𝕡𝕣𝕠𝕥𝕖𝕔𝕥𝕖𝕕 𝕗𝕠𝕟𝕥. 𝕐𝕠𝕦 𝕔𝕒𝕟𝕟𝕠𝕥 𝕔𝕠𝕡𝕪 𝕚𝕥. 𝔾𝕠 𝕒𝕙𝕖𝕒𝕕, 𝕥𝕣𝕪.', 'http://placehold.it/300x300'],
        [1, 'Do you guys mind', 'Do you guys mind not spamming the chat so much? I\'m really trying to pay attention to the stream and you guys are distracting me. If you guys really cared about the quality of the stream or Kripp himself you would stop the spamming and copying and pasting. God, I swear you guys are the worst part of twitch. Couldn\'t you just try to be mature for once in your life? Everyday I come here and it\'s the same thing, a bunch of no life neckbeards ruining this quality content for everyone else..', 'http://placehold.it/300x300'],
        [2, 'BlessRNG', 'BlessRNG Our Salt, who art in hearthstone, hallowed be thy game, your kripparian comes, your aggro decks be done, on constructed as it is in arena. BlessRNG Give us today our daily meme deck. BlessRNG And forgive us our rng bullshit, as we also have forgiven others rng bullshit. BlessRNG And lead us not into Smorc, but deliver us from the evil aggro decks. Amen BlessRNG', 'http://placehold.it/300x300'],
        [3, 'Fast spam', 'chat moving so fast no one will notice me seeking attention from strangers on the internet because my parents didn\'t give me any.', 'http://placehold.it/300x300'],
        [2, '💰', 'The 💰 intent 💰 is 💰 to 💰 provide 💰 players 💰 with 💰 a 💰 sense 💰 of 💰 pride 💰 and 💰 accomplishment 💰 for 💰 unlocking 💰 different 💰 heroes. 💰 As 💰 for 💰 cost, 💰 we 💰 selected 💰 initial 💰 values 💰 based 💰 upon 💰 data 💰 from 💰 the 💰 Open 💰 Beta 💰 and 💰 other 💰 adjustments 💰 made 💰 to 💰 milestone 💰 rewards 💰 before 💰 launch. 💰 Among 💰 other 💰 things, 💰 we\'re 💰 looking 💰 at 💰 average 💰 per-player 💰 credit 💰 earn 💰 rates 💰 on 💰 a 💰 daily 💰 basis, 💰 and 💰 we\'ll 💰 be 💰 making 💰 constant 💰 adjustments 💰 to 💰 ensure 💰 that 💰 players 💰 have 💰 challenges 💰 that 💰 are 💰 compelling, 💰 rewarding, 💰 and 💰 of 💰 course 💰 attainable 💰 via 💰 gameplay. We 💰 appreciate 💰 the 💰 candid 💰 feedback, 💰 and 💰 the 💰 passion 💰 the 💰 community 💰 has 💰 put 💰 forth 💰 around 💰 the 💰 current 💰 topics 💰 here 💰 on 💰 Reddit, 💰 our 💰 forums 💰 and 💰 across 💰 numerous 💰 social 💰 media 💰 outlets. Our 💰 team 💰 will 💰 continue 💰 to 💰 make 💰 changes 💰 and 💰 monitor 💰 community 💰 feedback 💰 and 💰 update 💰 everyone 💰 as 💰 soon 💰 and 💰 as 💰 often 💰 as 💰 we 💰 can. 💰', 'http://placehold.it/300x300'],
        [2, 'WeSmart', ' I swear all this chat ever does is pick the one idiot with the lowest IQ and copy whatever that brain dead moron types.', 'http://placehold.it/300x300']
    ];

    protected $commentsLevel1 = [
        ['Jebaited HEY ADVERTISERS Jebaited YOU\'RE ONLY PROMOTING TO ONE PERSON Jebaited NEED PROOF? Jebaited I\'LL POST THIS ON MY OTHER ACCOUNTS Jebaited'],
        ['The year is 2088, Kripp lays tattered on his deathbed, his organs absolutely ravaged from years of veganism. He turns to his computer monitor for one last look at his beloved twitch chat only to see a bunch of weebs, emote spam and copy pasta. Tears fill his lifeless, vegan eyes. Rania is at his side as he draws on all his power to take his last breath and say the only enlightening words that come to mind.. "K"'],
        ['You see, I have a very high IQ. Do you want to know why? Well, I\'ll tell you anyways, I have a high IQ because I watch this amazing television show (which to my surprise piqued my interest unlike many other television shows) Rick and Morty. This show is remarkably intellectual (Like me, mind you) and not like any other animated shows. My most favorite joke from the show is "WUBALUBADUBDUB" it makes me giddy inside and knowing the common folk wont understand the joke makes me laugh even harder!'],
        ['Honestly fuck the plebs.. they always bring toxic comments into the chat and I can\'t stand them any more. They think they are great but in reality they are Dumb Asses and are annoying af. I am glad I\'m not a stupid ass Pleb'],
    ];

    protected $commentsLevel2 = [
        ['PowerUpL DarkMode PowerUpR'],
        ['We blizzard care much about the player experience. For this reason, we\'re changing the card Ultimate Infestation as follows: Deal 5 damage, gain 5 armor, summon 3 JADE GOLEMS, Add 5 Jade Idol to your hand. I\'m Ben Brode, hope you still like my raps!'],
        [' ⛏ FeelsBadMan HOW LONG ⛏ FeelsBadMan CAN THIS ⛏ FeelsBadMan GO ON ⛏ FeelsBadMan'],
    ];

    protected $commentsLevel3 = [
        ['As the pain of hunger overtook the people of Africa they began to feel hope. "I will become the Fiora master!" said Michael "Imaqtpie" Santana. The people of Africa cheered.'],
        ['💪 for 💪 every 💪 copy/paste 💪 I 💪 will 💪 do 💪 1 💪 pushup 💪'],
        ['ONLY TheTick A TRUE VIEWBOT CAN WEAR THE ANTENNA MrDestructoid'],
    ];

    public function load(ObjectManager $manager)
    {
        $userContainer = [];
        foreach ($this->users as $userArray) {
            $user = new User();
            $user->setFirstName($userArray[0]);
            $user->setLastName($userArray[1]);
            $user->setEmail($userArray[2]);
            $user->setUsername($userArray[2]);
            $user->setPassword($userArray[3]);
            $manager->persist($user);
            $userContainer[] = $user;
        }

        $category1 = new ArticleCategory();
        $category1->setName('LOL');
        $category2 = new ArticleCategory();
        $category2->setName('Hearthstone');
        $category3 = new ArticleCategory();
        $category3->setName('Spam');
        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->flush();

        $categories = [1 => $category1, 2 => $category2, 3 => $category3];
        foreach ($this->articles as $key => $articleArray) {
            $article = new Article();
            $article->setCategory($categories[$articleArray[0]]);
            $article->setTitle($articleArray[1]);
            $article->setContent($articleArray[2]);
            $article->setImage($articleArray[3]);
            $manager->persist($article);

            foreach ($this->commentsLevel1 as $l1key => $commentArray) {
                if (rand(0, 1)) {
                    $comment = new Comment();
                    $comment->setContent($commentArray[0]);
                    $comment->setArticle($article);
                    $comment->setUser($userContainer[($l1key * 17) % count($userContainer)]);
                    $manager->persist($comment);

                    foreach ($this->commentsLevel2 as $l2key => $commentArray2) {
                        if (rand(0, 1) && rand(0, 2)) {
                            $comment2 = new Comment();
                            $comment2->setContent($commentArray2[0]);
                            $comment2->setParent($comment);
                            $comment2->setUser($userContainer[($l1key + $l2key * 3) % count($userContainer)]);
                            $manager->persist($comment2);
                            foreach ($this->commentsLevel3 as $l3key => $commentArray3) {
                                if (rand(0, 1) && rand(0, 1)) {
                                    $comment3 = new Comment();
                                    $comment3->setContent($commentArray3[0]);
                                    $comment3->setParent($comment2);
                                    $comment3->setUser(
                                        $userContainer[($l1key + $l2key + $l3key) % count($userContainer)]
                                    );
                                    $manager->persist($comment3);
                                }
                            }
                        }
                    }
                    $manager->flush();
                }
            }
        }
        $manager->flush();
    }
}
