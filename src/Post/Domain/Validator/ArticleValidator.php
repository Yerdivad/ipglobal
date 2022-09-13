<?php

namespace App\Post\Domain\Validator;

use App\shared\Exception\ExceptionEnums;
use App\shared\Exception\ValidationException;

class ArticleValidator
{
    public function validatePostParams(array $paramaters):array
    {
        $articleParams = [];

        foreach($paramaters as $key => $param){
            $articleParams[$key] = match ($key) {
                'title' => $this->validateTitle($param),
                'content' => $this->validateContent($param),
                'authorId' => $this->validateAuthorId($param),
                default => $this->validateNotEmpty($param),
            };
        }

        return $articleParams;
    }

    private function validateTitle(string $param):string
    {
        return $this->validateNotEmpty($param);
        //TODO añadir más validaciones
    }

    private function validateContent(string $param):string
    {
        return $this->validateNotEmpty($param);
        //TODO añadir más validaciones
    }

    private function validateAuthorId(int $param):int
    {
        return $this->validateNotEmpty($param);
        //TODO añadir más validaciones
    }

    private function validateNotEmpty(mixed $param):mixed
    {
        if (empty($param)) {
            throw new ValidationException(ExceptionEnums::VALOR_NO_VALIDO, ExceptionEnums::VALOR_NO_VALIDO_CODE);
        }
        return $param;

    }
}