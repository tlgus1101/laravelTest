<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Article.
 *
 * @package namespace App\Entities;
 */
class Article extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','img_old','img_new' ,'content'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}
