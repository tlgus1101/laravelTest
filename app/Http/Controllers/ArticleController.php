<?php

namespace App\Http\Controllers;

use App\Criteria\Article\CreatedAtBetweenCriteria;
use App\Criteria\Article\IdxCriteriaCriteria;
use App\Criteria\Article\TitleCriteria;
use App\Services\ArticleService;
use App\Repositories\ArticleRepositoryEloquent;
use Illuminate\Http\Request;
use DB;

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
        if($_GET['ck']==2){
            $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($_GET['idx']));
            $articles = $this->articleRepository->paginate(10);
            return view('article.create', compact('articles'));
        }

        return view('article.create');
    }

    public function show()
    {
        // $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($_GET['idx']));

        //$articles = $this->articleRepository->paginate(10);

        //return view('article.detail', compact('articles'));

        $article = array();
        //$articles = $this->articleRepository->findByField('idx',$_GET['idx']);

        $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($_GET['idx']));
        $articles = $this->articleRepository->delete();
        return view('article.show', compact('articles'));
    }

    public function edit(Request $request){

//        $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($_GET['idx']));
//        $article = $this->articleRepository->get();
//        return redirect()->route('article.edit', $article->id);
    }

    public function index(Request $request)
    {
        $title = $request->get('title');
        $createdAtFrom = $request->get('created_at_from');
        $createdAtTo = $request->get('created_at_to');

        if($title){
            $this->articleRepository->pushCriteria(new TitleCriteria($title));
        }
        if($createdAtFrom && $createdAtTo){
            $this->articleRepository->pushCriteria(new CreatedAtBetweenCriteria($createdAtFrom,$createdAtTo));
        }

        $articles = $this->articleRepository->paginate(10);
//
//        $articles = DB::table('test.articles')->paginate(5);


        //$articles = $this->articleRepository->paginate(5);

        return view('article.index', compact('articles'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $title = utf8_encode($request->input('title'));
//        $content = utf8_encode($request->input('content'));


//        $title = $request->input('title');//iconv('UTF-16','UTF-8',$request->input('title'));
//        $content = $request->input('content');//iconv('UTF-16','UTF-8',$request->input('content'));
//
//        $title = iconv( mb_detect_encoding( $title ), 'unicode', $title);
//        $content = iconv( mb_detect_encoding( $content ), 'unicode', $content);

        //$sql = "insert into test.article ('title','content') values (encode('$title','UTF-8'),encode('$content','UTF-8'));";

        //DB::insert($sql);

        //DB::table('article')->insert(['title'=>$title,'content'=>$content]);
        //Str::ascii($value)
       // DB::table('article')->insert(['title'=>$title,'content'=>$content]);
        $article = $this->articleService->create($request->all());

        //return view('article.show');
        return redirect()->route('article.index', $article->id);
    }
}