<?php

namespace App\Criteria\Article;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CreatedAtBetweenCriteria.
 *
 * @package namespace App\Criteria\Article;
 */
class CreatedAtBetweenCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */

    private $from;
    private  $to;


    public function __construct($from,$to)
    {
        $this->from = $from;
        $this->to = $to;
    }


    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereBetween('created_at',[$this->from.' 00:00:00 ', $this->to.' 23:59:59 ']);
    }
}
