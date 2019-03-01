<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->where('published_at','<=',Carbon::now())
                ->orderBy('published_at','desc')
                ->paginate(config('blog.posts_per_page'));
//        $posts = Post::where('published_at','<=',Carbon::now())
//            ->orderBy('published_at','desc')
//            ->paginate(config('blog.posts_per_page'));
        
        return view('blog.index',compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('blog.post',['post' => $post]);
    }
}
