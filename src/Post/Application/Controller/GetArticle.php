<?php

namespace App\Post\Application\Controller;

use App\Post\Infrastructure\Repository\ArticleExternalRestApiRepository;
use App\Post\Infrastructure\Repository\AuthorExternalRestApiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetArticle extends AbstractController
{
    #[Route('/post/article/{id}', name: 'get_article', methods: ['GET'])]
    public function index(int                              $id,
                               ArticleExternalRestApiRepository $articleRepository,
                               AuthorExternalRestApiRepository  $authorRepository): Response
    {

        $article = $articleRepository->find($id);
        $author = $authorRepository->find($article->getAuthor());

        return $this->render('post/article/single.html.twig', [
            'controller_name' => 'Get Article',
            'article' => $article,
            'author' => $author
        ]);
    }
}