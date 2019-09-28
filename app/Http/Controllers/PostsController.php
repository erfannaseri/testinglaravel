<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidation;
use App\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Posts::paginate(4);

        return view('posts.all',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.add-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormValidation $request)
    {
        $validatedData = $request->validated();
        // You create a post here
        Posts::create($validatedData);
        // And create another post here
        // Are you sure?
        $post=new Posts([
            'title'     =>$request->input('title'), // Use model properties instead of arrays
            'author'    =>$request->input('author'),
            'content'   =>$request->input('content')
        ]);
        $post->save();

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
      *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts=Posts::where('id',$id)->get();

       return view('posts.edit',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post=Posts::find($id);
        $post->update([
           'title'  =>$request->input('title'),
            'author'=>$request->input('author'),
            'content'=>$request->input('content')
        ]);
        $post->save();
        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Posts::find($id); // Post::delete($id)
        $posts->delete();
        return redirect('/posts');
    }
}
