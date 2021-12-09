<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for($i=1; $i<=10; $i++)
        {
            $article = new Article;

            $article->setTitre("titre de l'article $i")
                    ->setContenu("<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus voluptatibus est quaerat, sequi sapiente possimus perferendis quasi. Rem, unde quam.</p>")
                    ->setPhoto("https://picsum.photos/id/238/300/600")
                    ->setDate(new \DateTime());

                    $manager->persist($article);
        }
        
        $manager->flush();
    }
}
