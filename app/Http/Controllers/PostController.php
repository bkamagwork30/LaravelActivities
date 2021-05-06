<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only('create');
        $this->middleware('auth')->only('destroy');
        $this->middleware('auth')->only('edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = Post::get();
        // return view('posts.index', compact('post'));
        $posts = Post::where('title','!=','')->orderBy('created_at','desc')->get();
        $count = Post::where('title','!=','')->count();
        return view('posts.index', compact('posts', 'count'));
        
    }

    /**
     * Show the form for creating a new resource.S
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'title' => 'required|unique:posts|max:225',
            'description' => 'required'
        ]);
        // dd($request);
        if($request->hasFile('img')){
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename.''.time().'.'.$extension;
            $path = $request->file('img')->storeAs('public/img', $fileNameToStore);
        }else{
            $fileNameToStore = '';
        }

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->img = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //Shows a specific data row to show
        $show = Post::find($post->id);
        $comments = $post->comments;
        // dd($post);

        return view('posts.show', compact('show', 'comments'));

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
        return view('posts.edit', compact('post'));
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
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
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
            $post = Post::find($id);
            $post->delete();

            return redirect('/posts');
    }   
}
