<?php
namespace App\Services;

use App\Repositories\ArticleRepositoryEloquent;
use App\Validators\ArticleValidator;
use Prettus\Validator\LaravelValidator;

class ArticleService extends BaseService
{
    /**
     * @var ArticleRepository
     */
    private $repo;
    /**
     * @var ArticleValidator
     */
    private $validator;

    /**
     * ArticleService constructor.
     * @param ArticleRepository $repo
     * @param ArticleValidator $validator
     */
    public function __construct(
        ArticleRepositoryEloquent $repo,
        ArticleValidator $validator
    ) {
        $this->repo = $repo;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $this->validate($this->validator, LaravelValidator::RULE_CREATE, $data);

        return $this->repo->create($data);
    }

    public function form(array $data)
    {
        $this->validate($this->validator, LaravelValidator::RULE_UPDATE, $data);

        return $this->repo->form($data);
    }
}