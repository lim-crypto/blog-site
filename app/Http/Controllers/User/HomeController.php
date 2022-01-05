<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\Category;
use App\Model\user\Post;
use App\Model\user\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->orderBy('created_at','desc')->paginate(5);
        return view('user.blog', compact('posts'));
    }
    public function category(Category $category)
    {
         $posts= $category->posts()->where('status',1)->orderBy('created_at','desc')->paginate(5);
        return view('user.blog', compact('posts'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status',1)->orderBy('created_at','desc')->paginate(5);
        return view('user.blog', compact('posts'));
    }

}