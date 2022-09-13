<?php

namespace App\Post\Application\Api;

use App\Post\Domain\Validator\ArticleValidator;
use App\Post\Infrastructure\Repository\ArticleExternalRestApiRepository;
use App\Post\Infrastructure\Repository\AuthorExternalRestApiRepository;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostArticle extends AbstractController
{
    #[Route('/api/post/article/', name: 'api_post_article', methods: 'POST')]
    public function postArticle(Request $request,
                                ArticleValidator $articleValidator,
                                ArticleExternalRestApiRepository $articleRepository,
                                AuthorExternalRestApiRepository  $authorRepository): JsonResponse
    {
        try {

            $parameters = json_decode($request->getContent(), true);
            $articleData = $articleValidator->validatePostParams($parameters);
            $article = $articleRepository->save($articleData);

        } catch (\Exception $e) {
            return $this->errorJsonResponse($e->getMessage());
        }
        $author = $authorRepository->find($article->getAuthor());

        return new JsonResponse([
            'id' => $article->getId(),
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'author' => $author->getName()
        ],200);
    }

    private function errorJsonResponse(string $exceptionMessage):JsonResponse
    {
        return new JsonResponse([
            'error' => $exceptionMessage
        ],503);
    }
}