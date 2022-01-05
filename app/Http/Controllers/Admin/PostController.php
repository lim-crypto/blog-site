<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Category;
use App\Model\user\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
            $categories = Category::all();
            $tags = Tag::all();
            return view('admin.post.create', compact('categories', 'tags'));
        }
        return redirect(route('admin.home'))->with('error', 'You are not authorized to access this page');
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
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->storeAs('public/post', $image_name);

            $post->image = $image_name;
        }
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->can('posts.create')) {
            $post = Post::with('tags', 'categories')->where('id', $post->id)->first();
            $tags = Tag::all();
            $categories = Category::all();
            return view('admin.post.edit', compact('post', 'tags', 'categories'));
        }
        return redirect(route('admin.home'))->with('error', 'You are not authorized to access this page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);


        //update post
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        if ($request->hasFile('image')) {
            $this->deleteImage($post->image);
            $post->image = $this->uploadImage($request->file('image'));
        }
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->deleteImage($post->image);
        $post->delete();
        return redirect()->back();
    }

    // upload image
    public function uploadImage($image)
    {
        $image_name = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/post', $image_name);
        return $image_name;
    }
    // delete image
    public function deleteImage($image)
    {
        if ($image) {
            Storage::delete('/public/post/' . $image);
        }
        return;
    }
}
