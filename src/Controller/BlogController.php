<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\ManagerRegistry as DoctrineManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function blog(ManagerRegistry $doctrine): Response
    {
        $repoArticle = $doctrine->getRepository(Article::class);

        // dd($repoArticle);
        $articles = $repoArticle->findAll();

        // dd($articles);

        return $this->render('blog/blog.html.twig', [
            'articles'=>$articles
        ]);
    }

    #[Route('/', name:"home")]
    public function home(): Response
    {
        return $this->render('blog/home.html.twig', [
            'title'=> 'Bienvenue sur le blog Symfony', 
            'age' => 25
        ]);
    }

    #[Route('/blog/{id}', name:'blog_show')]
    public function blogShow($id, ManagerRegistry $doctrine): Response
    {
        $repoArticle = $doctrine->getRepository(Article::class);
        $article = $repoArticle->find($id);

        // dd($article);
        return $this->render('blog/blog_show.html.twig', [
            'article'=>$article
        ]
            );
    }
}
