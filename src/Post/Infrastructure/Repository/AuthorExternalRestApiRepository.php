<?php

namespace App\Post\Infrastructure\Repository;

use App\Post\Domain\Entity\Author;
use App\Post\Domain\Repository\AuthorRepositoryInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AuthorExternalRestApiRepository implements AuthorRepositoryInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function find(int $id):Author
    {
        $response = $this->client->request(
            'GET',
            'https://jsonplaceholder.typicode.com/users/'.$id
        );

        $user = $response->toArray();

        $author = new Author();
        $author->setName($user['name']);
        $author->setAbstract($user['company']['catchPhrase']);

        return $author;
    }
}
