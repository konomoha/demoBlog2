<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function blog(ManagerRegistry $doctrine): Response
    {
        $repoArticle = $doctrine->getRepository(Article::class);
        $articles = $repoArticle->findAll();

        dd($articles);

        return $this->render('blog/blog.html.twig');
    }

    #[Route('/', name:"home")]
    public function home(): Response
    {
        return $this->render('blog/home.html.twig', [
            'title'=> 'Bienvenue sur le blog Symfony', 
            'age' => 25
        ]);
    }

    #[Route('/blog/12', name:'blog_show')]
    public function blogShow(): Response
    {
        return $this->render('blog/blog_show.html.twig');
    }
}
