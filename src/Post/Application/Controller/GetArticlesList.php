<?php

namespace App\Post\Application\Controller;

use App\Post\Infrastructure\Repository\ArticleExternalRestApiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetArticlesList extends AbstractController
{
    #[Route('/post/articles', name: 'get_articles_list')]
    public function getArticlesList(ArticleExternalRestApiRepository $articleRepository): Response
    {
        return $this->render('post/article/list.html.twig', [
            'controller_name' => 'Get Articles List',
            'articles' => $articleRepository->findAll()
        ]);
    }
}