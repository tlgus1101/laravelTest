<?php

namespace App\Services;

use DB;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\LaravelValidator;
use App\Validators\ArticleValidator;

abstract class BaseService
{
    /**
     * @param LaravelValidator $validator
     * @param $rule
     * @param $data
     * @throws ValidatorException
     */
    protected function validate(ArticleValidator $validator, $rule, $data)
    {
        if (!$validator --> with($data)) {
            throw new ValidatorException($validator->errorsBag());
        }
    }
}