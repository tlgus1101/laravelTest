<?php

namespace App\Http\Controllers;

use App\Criteria\Article\CreatedAtBetweenCriteria;
use App\Criteria\Article\IdxCriteriaCriteria;
use App\Criteria\Article\TitleCriteria;
use App\Services\ArticleService;
use App\Repositories\ArticleRepositoryEloquent;
use Illuminate\Http\Request;
use DB;
use App\Entities\Article;

class ArticleController extends Controller
{
    /**
     * @var ArticleService
     * 컨트롤 하는 곳
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
    )
    {
        $this->articleService = $articleService;
        $this->articleRepository = $articleRepository;
    }

    /**article.destroy
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = null;
        return view('article.create',compact('articles'));
    }

    public function edit($idx)
    {
        $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($idx));
        $articles = $this->articleRepository->paginate(50);
       // $articles=null;
        return view('article.edit',compact('articles'));
    }
    public function update(Request $request)
    {
        // $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($_POST['idx']));
        // $articles = $this->articleRepository->update("update test.articles set title = $title AND contnet = $content");
        // $art = array('title' => $_POST['title']  AND 'content' => $_POST['content']);
        //$title = $_POST['title'];
       // $content = $_POST['content'];
        //$idx = $_POST['idx'];
        //$articles = [ 'title' => $idx,'idx'=>$idx];
        //printf($idx);
        //  $articles = $this->articleRepository->update($art,$idx);

       // DB::update('update test.articles set title = ? , content = ?  where idx = ?',[$title,$content,$idx]);


        // $articles = $this->articleRepository->update ('update test.articles set title = ? , content = ?  where idx = ?',[$title,$content,$idx]);
        $articles = $this->articleService->update($request->all());
        return redirect()->route('article.show',$articles);
    }
    public function destroy( Request $request)
    {
       // $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($id));
       // $articles = $this->articleRepository->delete($id);
        //DB::delete ('DELETE FROM test.articles  where idx = ?',[$request->get('idx')]);
        $this->articleService->delete($request->all());
        return redirect()->route('article.index');
    }


    public function show()
    {
        // $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($_GET['idx']));
        //$articles = $this->articleRepository->paginate(10);
        //return view('article.detail', compact('articles'));
        //$articles = $this->articleRepository->findByField('idx',$_GET['idx']);

        $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($_GET['idx']));
        $articles = $this->articleRepository->paginate(1);

        return view('article.show', compact('articles'));
    }


    public function index(Request $request)
    {
        $title = $request->get('title');
        $createdAtFrom = $request->get('created_at_from');
        $createdAtTo = $request->get('created_at_to');

        if ($title) {
            $this->articleRepository->pushCriteria(new TitleCriteria($title));
        }
        if ($createdAtFrom && $createdAtTo) {
            $this->articleRepository->pushCriteria(new CreatedAtBetweenCriteria($createdAtFrom, $createdAtTo));
        }

        $articles = $this->articleRepository->orderBy('idx','desc')->paginate(50);
//
//        $articles = DB::table('test.articles')->paginate(5);


        //$articles = $this->articleRepository->paginate(5);

        return view('article.index', compact('articles'));
    }

//   public function page()
//    {
//        return View("article.page");
//    }
//
//    public function upload(Request $request){
//        $file = $request->file('uploadFile');
//
//        $path = '../images';
//        $file->move($path,$file->getClientOriginalName());
//        return redirect()->route("article.page");
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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

//        if($_POST['edit']=='ok'){
//          // $this->articleRepository->pushCriteria(new IdxCriteriaCriteria($_POST['idx']));
//           // $articles = $this->articleRepository->update("update test.articles set title = $title AND contnet = $content");
//           // $art = array('title' => $_POST['title']  AND 'content' => $_POST['content']);
//           // $title = $_POST['title'];
//            //$content = $_POST['content'];
//            //$idx = $_POST['idx'];
//            //$articles = [ 'title' => $idx,'idx'=>$idx];
//           // printf($idx);
//          //  $articles = $this->articleRepository->update($art,$idx);
//
//            $articles = $this->articleService->update($request->all());
//            return redirect()->route('article.show', $articles);
////        }
//
//        else{


        $file = $request->file('uploadFile');
        $path = '../images';


        $fileName = $file->getClientOriginalName();
        $ext = explode('.',$fileName);

        $ran='';
        for ($i = 0; $i < 10; $i++) {
            $ran .= mt_rand(0, 9);
        }

        $ret = time() ."-" . $ran . "." . array_pop($ext);
        //$ret = "$name.$ext";

        $Cnt = 0;

        while (file_exists($path . $ret) != null) {
            $Cnt++;
            $ret = $ret . "_" . $Cnt . "." . $ext;

        }

        $file->move($path,$ret);
        $request['img_old']=$file->getClientOriginalName();
        $request['img_new']=$ret;


        $article = $this->articleService->create($request->all());
        //return view('article.show');
        return redirect()->route('article.index', $article->id);
       // }
    }


}