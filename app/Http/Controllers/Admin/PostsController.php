<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
// use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    // public function create(){
        
    //     $categories = Category::all();
    //     // $tags = Tag::all();
    //     return view('admin.posts.create', compact('categories'));
    // }

     public function store(Request $request){
        
        //validacion
        $this->validate($request, ['title' => 'required']);

        $post = Post::create(['title' => $request->get('title'), 'url' => str_slug($request->get('title'))]);

        return redirect()->route('admin.posts.edit', $post);
        
    }

    public function edit(Post $post){
         $categories = Category::all();
        // $tags = Tag::all();
        return view('admin.posts.edit', compact('categories','post'));
        // return view('admin.posts.edit', compact('post'));
    }

    public function update(Post $post, StorePostRequest $request){             

        // return Post::create($request->all());
        
        $post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->body = $request->get('body');
        $post->iframe = $request->get('iframe');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->get('published_at');
        $post->category_id = $request->get('category_id');

        
        $post->save();

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu articulo ha sido guardado!');
        
    }

    public function destroy(Post $post){

        // $post->tags()->detach();

        $post->delete();
        
        return redirect()->route('admin.posts.index')->with('flash', 'Tu articulo ha sido eliminado');
    }

   
}
