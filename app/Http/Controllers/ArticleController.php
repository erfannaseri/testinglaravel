<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function index(){
        $articles=Article::paginate(2);
        $count=$articles->count();

        return view('articles.all',compact('articles','count'));
    }
    public function show($id){
        $articles=Article::find($id);
        $comments=Article::find($id)->comments()->paginate(2);
        $categories=Article::find($id)->categories()->get();

        return view('articles.show',compact('articles','comments','categories'));
    }

    public function create(){
        $categories=Category::all();
        return view('articles.create',compact('categories'));
    }

    public function store(Request $request){
           $article=Article::create([
               'title'=>$request->input('title'),
                'source'=>$request->input('source'),
                'content'=>$request->input('content')
        ]);
           $article->save();
           $article->categories()->sync($request->input('categories'));
            return back();
    }
    public function edit($id)
    {
        $articles=Article::find($id);
        $categories=Category::all();
        return view('articles.edit',compact('articles','categories'));
    }
    public function update(Request $request,$id){
       $article=Article::find($id);
        $article->update([
          'title'=>$request->input('title'),
          'source'=>$request->input('source'),
          'content'=>$request->input('content')
       ]);
       $article->save();
       $article->categories()->sync($request->input('categories'));
        return redirect('articles');
    }
    public function delete($id){
        DB::table('articles')->where('id',$id)->delete();
        return redirect('articles');
    }
    public function storeComment(Request $request,$articleId)
    {
       $article=Article::find($articleId);
       $article->comments()->create([
           'author'=>$request->input('author'),
           'content'=>$request->input('content')
       ]);
       $article->save();
       return redirect('/articles/'.$articleId);

    }

}
