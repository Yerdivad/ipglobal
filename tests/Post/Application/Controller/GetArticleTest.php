<?php

namespace App\Tests\Post\Application\Controller;

use App\Post\Application\Controller\GetArticle;
use App\Post\Domain\Entity\Article;
use App\Post\Domain\Entity\Author;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;

class GetArticleTest extends WebTestCase
{
    private KernelBrowser $client;
    private string $path = '/pajaros/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Pajaro index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }
}