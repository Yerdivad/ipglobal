<?php

namespace App\Post\Domain\Repository;

use App\Post\Domain\Entity\Article;

interface ArticleRepositoryInterface
{
    public function find(int $id):Article;

    public function findAll():array;

    public function save(array $data):Article;
}