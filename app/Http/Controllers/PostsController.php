<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('title','asc')->paginate(10);

        //limit the posts
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        
        //get all the posts
        //$posts = Post::all();
        
        //filter posts
        //$posts = Post::where('title','post one')->get();
        
        //use query instead of elequant
        //$posts = DB::select('select * from posts');
        
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           
            'title' => 'required',
            'body' => 'required'
            
        ]);
        
        //Create the post
        
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        
        return redirect('/dashboard')->with('succses','Post posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $post = Post::find($id);
        
        // check for the right user
        if(auth()->user()->id != $post->user_id) {
            
        return redirect('/posts')->with('error', 'Your not authrized');
            
        }
        
        return view('posts.edit')->with('post', $post);        
        
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

        $this->validate($request, [
           
            'title' => 'required',
            'body' => 'required'
            
        ]);
        
        //Create the post
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        
        return redirect('/dashboard')->with('succses','Post updated');        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        // check for the right user
        if(auth()->user()->id != $post->user_id) {
            
        return redirect('/posts')->with('error', 'Your not authrized');
            
        }
        
        $post->delete();
        
        return redirect('/dashboard')->with('succses','Post was deleted');
    }
}
