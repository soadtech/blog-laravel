<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function store(Post $post){
        
        $post->photos()->create([
            'url' => request()->file('photo')->store('posts', 'public')
        ]);

        // Photo::create([
        //     'url' => request()->file('photo')->store('posts', 'public'),
        //     'post_id' => $post->id
        // ]);
    }

    public function destroy(Photo $photo){

        $photo->delete();
        


        return back()->with('flash', 'Foto eliminada');
    }
}
