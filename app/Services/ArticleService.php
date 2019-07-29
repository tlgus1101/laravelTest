<?php
namespace App\Services;

use App\Repositories\ArticleRepositoryEloquent;
use App\Validators\ArticleValidator;
use Prettus\Validator\LaravelValidator;


class ArticleService extends BaseService
{
    /**
     * @var ArticleRepository
     *
     * sql문 보내주기 건 중간 단계 여기서 검사 같은거 하고 넘어감? ==>validator
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
    public function create(array $data)//$request == $data
    {
        //$this->validate($this->validator, ArticleValidator::RULE_CREATE, $data);

        return $this->repo->create($data);
    }

    public function update(array $data)//$request == $data
    {
        //$this->validate($this->validator, ArticleValidator::RULE_UPDATE, $data);
        $this->repo->update($data,$data['idx']);
        return $data;
    }

    public function delete(array $data)//$request == $data
    {
        $this->repo->delete($data['idx']);
        return $data;
    }

}