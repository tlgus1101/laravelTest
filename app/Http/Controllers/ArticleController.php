<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Repositories\ArticleRepositoryEloquent;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    private $articleService;
    /**
     * @var ArticleRepository
     */
   // private $articleRepository;
    /**
     * ArticleController constructor.
     * @param ArticleService $articleService
     * @param ArticleRepository $articleRepository
     */
    public function __construct(
        ArticleService $articleService,
        ArticleRepositoryEloquent $articleRepository
    ) {
        $this->articleService = $articleService;
        $this->articleRepository = $articleRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }
    public function form()
    {
        return view('article.form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $this->articleService->create($request->all());

        return redirect()->route('article.show', $article->id);
    }
}