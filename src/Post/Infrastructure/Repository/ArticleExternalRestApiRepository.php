<?php

namespace App\Post\Infrastructure\Repository;

use App\Post\Domain\Entity\Article;
use App\Post\Domain\Repository\ArticleRepositoryInterface;
use Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ArticleExternalRestApiRepository implements ArticleRepositoryInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function findAll():array
    {
        $response = $this->client->request(
            'GET',
            'https://jsonplaceholder.typicode.com/posts'
        );

        $posts = $response->toArray();

        $articles = [];

        foreach($posts as $post){
            $article = new Article();
            $article->setId($post['id']);
            $article->setTitle($post['title']);
            $article->setContent($post['body']);
            $articles[] = $article;
        }
        return $articles;
    }

    public function find(int $id):Article
    {
        $response = $this->client->request(
            'GET',
            'https://jsonplaceholder.typicode.com/posts/'.$id
        );

        $post = $response->toArray();

        $article = new Article();
        $article->setTitle($post['title']);
        $article->setContent($post['body']);
        $article->setAuthor($post['userId']);

        return $article;
    }

    /**
     * @throws Exception
     */
    public function save(array $data):Article
    {
        $article = new Article();
        $article->setTitle($data['title']);
        $article->setContent($data['content']);
        $article->setAuthor($data['authorId']);

        try {
            //Persist in database and return Article with ID
            $article->setId(rand(1,100));//We set a random ID for Mock only.
        }catch (Exception $e){
            throw new Exception('Could not be saved, please try again.');
        }
        return $article;
    }
}
