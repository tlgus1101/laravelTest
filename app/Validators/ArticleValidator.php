<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ArticleValidator.
 *
 * @package namespace App\Validators;
 */
class ArticleValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'required|min:10|max:225',
            'content' => 'required|min:10',
        ],

        ValidatorInterface::RULE_CREATE => [
            'title' => 'required|min:10|max:225',
            'content' => 'required|min:10',
        ],
    ];



}
