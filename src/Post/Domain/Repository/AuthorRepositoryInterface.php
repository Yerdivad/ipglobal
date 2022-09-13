<?php

namespace App\Post\Domain\Repository;

use App\Post\Domain\Entity\Author;

interface AuthorRepositoryInterface
{
    public function find(int $id):Author;
}