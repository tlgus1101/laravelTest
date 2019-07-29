<?php

namespace App\Criteria\Article;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class IdxCriteriaCriteria.
 *
 * @package namespace App\Criteria\Article;
 */
class IdxCriteriaCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */

    private $idx;
    public function __construct($idx)
    {
        $this->idx = $idx;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('idx','=',$this->idx);
    }
}
