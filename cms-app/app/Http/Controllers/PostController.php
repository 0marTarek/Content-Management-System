<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('checkCategory')->only('create');
    }
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create")->with(['categories' => Category::all(), 'tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
       $post = Post::create([
            'Title' => $request->Title ,
            'Description' => $request->Description ,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $request->PostImage->store('images', 'public'),
            'user_id' =>  auth()->user()->id
        ]);
        if($request->tags)
        {
            $post->tags()->attach($request->tags);
        }
        session()->flash('post_success', 'Post Added successfully.');
        return redirect( route('posts.index')) ;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($id)
    {
        $post = Post::find($id);
        return view('posts.content',['post' =>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $p)
    {
        $posts = Post::find($p);
        return view('posts.create')->with(['posts' =>$posts,'categories'=>Category::all(),'tags'=>Tag::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    { 
        $data = $request->only(['Title', 'Description','content']);
        if($request->hasFile('PostImage'))
        {
            Storage::disk('public')->delete($request->image);
            $image = $request->PostImage->store('images','public');
            $data['image'] = $image;
        }
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $post->update($data);
        session()->flash('Updated', 'A post updated successfully.' );
        return redirect( route('posts.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Post::withTrashed()->where('id', '=' , $id)->first();
        $message = "";
        if($p->Trashed())
        {
            $p->forceDelete();
            Storage::disk('public')->delete($p->image);
            $message = 'A post deleted successfully.';
            session()->flash('PostDeleted',$message);
            return redirect( route('posts.trashedPosts') ); 
        }
        else
        {
            $del_post = $p;
            $p->Delete();
            session()->flash('PostTrashed',$del_post->id);
             return redirect( route('posts.index') ); 
        }
        
    }

    public function TrashedPosts()
    {  
        return view('posts.index')->withposts(Post::onlyTrashed()->get());
    }

    public function RestoreTrashedPosts($id)
    {
        $post = Post::withTrashed()->where('id',$id)->restore();
        session()->flash('Restored','a post restored successfully.');
        return redirect( route('posts.index'));
        
    }
}
