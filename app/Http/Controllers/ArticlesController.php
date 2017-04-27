<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ArticleRequest;
use App\Article, App\Comment;
use Session;
use Excel;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::paginate(5);



        return view('articles.index',compact('articles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new_article = new Article;
        $new_article->title = "Learn Laravel";
        $new_article->content = "lorem ipsum laravel ok kara ka nande ora akh";
        $new_article->save();
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all());

  Session::flash("notice", "Article success created");

  return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

    $comments = Article::find($id)->comments->sortBy('Comment.created_at');

    return view('articles.show')

      ->with('article', $article)

      ->with('comments', $comments);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $new_article = Article::find($id);

        $new_article->title;

        $new_article->save();

        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        Article::find($id)->update($request->all());

    Session::flash("notice", "Article success updated");

    return redirect()->route("articles.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);

    Session::flash("notice", "Article success deleted");

    return redirect()->route("articles.index");
    }

    public function importExport()

    {

        return view('importExport');

    }

    public function downloadExcel(Request $request, $id)

    {
        $export = [];
        // $data = Article::with(array('comments' => function($query) {                       
        //     $query->select('article_id','content');
        //     $query->where('article_id', 3);
        //     $query->orderBy('comments.created_at', 'DESC');
        // }))->where('id', 3)->get()->toArray();''

        // $data = Comment::findby('article_id', '=', $id);

        // foreach ($data as $key => $datas) {
        //     array_push($export, $datas->article->content);
        //     array_push($export, $datas->content);
        // }

        //dd($export);
        // Payment = Article 
        // users = relasi model comment 

        // App\Article::join('comments', 'comments.id', '=', 'article.id')->select('article.id', 'content')->get();
 
        $data =  Article::join('comments', 'comments.article_id', '=', 'articles.id')->select('articles.id','articles.title','comments.content')->where('articles.id' ,'=',$id )->get();

        Excel::create('payments', function($excel) use ($data) {

        $excel->sheet('sheet1', function($sheet) use ($data) {
            $sheet->fromArray($data, null, 'A1', false, true);
        });

        })->download('xls');

        //$data = Article::find($id)->comments->sortBy('Comment.created_at');

        // return Excel::create('DB_Article', function($excel) use ($data) {

        //     $excel->sheet('mySheet', function($sheet) use ($data)

        //     {

        //          $sheet->fromArray($data);

        //     });

        // })->download('ods');

    }


    public function importExcel(Request $request)

    {
         $file = $request->file('import_file')->getClientOriginalName();

        $extension = pathinfo($file, PATHINFO_EXTENSION);

        if($request->hasFile('import_file')){

            $path = $request->file('import_file')->getRealPath();
           

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                if ($extension=="ods") {
                    foreach ($data->toArray() as $key => $value) {

                    if(!empty($value)){

                        foreach ($value as $v) {        

                            $insert[] = ['title' => $v['title'], 'content' => $v['content']];

                        }

                    }

                    }
                }elseif (($extension=="xls") or ($extension=="xlsx")) {
                    foreach ($data->toArray() as $key => $value) {
                        // if(!empty($value)){
                        // foreach ($value as $v) {
                        $insert[] = ['title' => $value['title'], 'content' => $value['content']];
                        //}
                        //}
                        }
                }
                


                

                if(!empty($insert)){

                    Article::insert($insert);

                    return back()->with('success','Insert Record successfully.');

                }


            }


        }


        return back()->with('error','Please Check your file, Something is wrong there.');

    }


}
