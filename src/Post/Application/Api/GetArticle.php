<?php

namespace App\Post\Application\Api;

use App\Post\Infrastructure\Repository\ArticleExternalRestApiRepository;
use App\Post\Infrastructure\Repository\AuthorExternalRestApiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetArticle extends AbstractController
{
    #[Route('/api/post/article/{id}', name: 'api_get_article', methods: 'GET')]
    public function getArticle(int                              $id,
                               ArticleExternalRestApiRepository $articleRepository,
                               AuthorExternalRestApiRepository  $authorExternalRestApiRepository): JsonResponse
    {
        $article = $articleRepository->find($id);
        $author = $authorExternalRestApiRepository->find($article->getAuthor());

        return new JsonResponse(['id' => $article->getId(),
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'author' => $author->getName(),
            'author_abstract' => $author->getAbstract()
        ],200);
    }
}