<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function index(){
        $articles=Article::all();
        $count=$articles->count();

        return view('articles.all',compact('articles','count'));
    }
    public function show($id){
        $articles=Article::find($id);

        return view('articles.show',compact('articles'));
    }
    public function create(){
        return view('articles.create');
    }
    public function store(Request $request){
            DB::table('articles')->insert([
            'title'=>$request->input('title'),
            'source'=>$request->input('source'),
            'content'=>$request->input('content')
            ]);
            if (true) {
                Session::flash('insertArticle','مقاله مورد ن ظر ثبت شد');
            }
            return back();
    }
    public function edit($id){
        $articles=DB::table('articles')->where('id',$id)->get();
        return view('articles.edit',compact('articles'));
    }
    public function update(Request $request,$id){
        DB::table('articles')->where('id',$id)->update([
            'title'  =>$request->input('title'),
            'source' =>$request->input('source'),
            'content'=>$request->input('content')
        ]);
        return redirect('articles');
    }
    public function delete($id){
        DB::table('articles')->where('id',$id)->delete();
        return redirect('articles');
    }
    public function storeComment(Request $request,$articleId){
       $article=Article::find($articleId);
       $article->comments()->create([
           'author'=>$request->input('author'),
           'content'=>$request->input('content')
       ]);
       $article->save();
       return redirect('/articles/'.$articleId);

    }
    public function testing(){
        $article=Article::find(1)->comments();
       var_dump($article);
    }
}
