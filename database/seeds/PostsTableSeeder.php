<?php
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
        Post::truncate();
        Category::truncate();

        $category = new Category;
        $category->name = "Categoria 1";
        $category->save();

        $category = new Category;
        $category->name = "Categoria 2";
        $category->save();

        $post = new Post;
        $post->title = "Mi primer Post";
        $post->url = str_slug("Mi primer Post");
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Mi Segundo Post";
        $post->url = str_slug("Mi primer Post");
        $post->excerpt = "Extracto de mi Segundo post";
        $post->body = "<p>Contenido de mi Segundo post</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 2;
        $post->save();

        $post = new Post;
        $post->title = "Mi Tercer Post";
        $post->url = str_slug("Mi primer Post");
        $post->excerpt = "Extracto de mi Tercer post";
        $post->body = "<p>Contenido de mi Tercer post</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 2;
        $post->save();
    }
}
