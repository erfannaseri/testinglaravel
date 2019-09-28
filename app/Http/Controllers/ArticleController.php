<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function index(){
        $articles=Article::paginate(10);
        $count=Article::count();

        return view('articles.all',compact('articles','count'));
    }
    public function show($id){
        $article=Article::find($id);

        return view('articles.show',compact('article'));
    }
    public function create(){
        return view('articles.create');
    }
    public function store(Request $request){
            // TODO: Use model instead of queries
            DB::table('articles')->insert([
            'title'=>$request->input('title'),
            'source'=>$request->input('source'),
            'content'=>$request->input('content')
            ]);
        
            // if true !?
            if (true) {
                // Use language files instead of writing fucking farsi in your codes
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

}
