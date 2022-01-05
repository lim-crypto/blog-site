<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\Like;
use App\Model\user\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Post $post)
    {
        return view('user.post', compact('post'));
    }
    public function getAllPosts()
    {
        $posts = Post::with('likes')->where('status', 1)->orderBy('created_at', 'desc')->paginate(5);
        return $posts;
    }
    public function saveLike(Request $request)
    {
        $likecheck = Like::where('user_id', Auth::id())->where('post_id', $request->id)->first();
        if ($likecheck) {
            // unlike
            $likecheck->delete();
            return 'unlike';
        } else {

            $like = new Like();
            $like->user_id = Auth::id();
            $like->post_id = $request->id;
            $like->save();
            return response()->json(['success' => 'Post Liked']);
        }
    }
}
