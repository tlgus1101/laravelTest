<?php

namespace App\Criteria\Article;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class TitleCriteria.
 *
 * @package namespace App\Criteria\Article;
 */
class TitleCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */

    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }


    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('title','like','%'.$this->title.'%');
    }
}
