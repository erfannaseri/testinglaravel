<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use DemeterChain\C;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $count=$categories->count();
        return view('category.index',compact('categories','count'));
    }
    public function create()
    {
        $articles=Article::all();
        return view('category.create',compact('articles'));
    }
    public function store(Request $request )
    {
        $categories=Category::create([
           'title'=>$request->input('title')
        ]);
        $categories->save();

        $categories->articles()->sync($request->input('articles'));

        return redirect('/categories');
    }
    public function edit($id)
    {

        $categories=Category::find($id);
        $articles=Article::all();
        return view('category.edit',compact('categories','articles'));
    }

    public function update(Request $request,$id)
    {
        $categories=Category::find($id);
        $categories->update([
           'title'=>$request->input('title')
        ]);
        $categories->save();
        $categories->articles()->sync($request->input('articles'));
        return redirect('/categories');
    }
    public function destroy($id)
    {
        $categories=Category::find($id);
        $categories->delete();
        return redirect('categories');

    }
    public function test()
    {
        //$cat=Category::find(2)->articles()->get();
        //$cat=Category::with('articles')->where('id',4)->get();
        $cat=new Category();
        $cat->articles()->where('id',4)->get();
        return $cat;
    }

}
