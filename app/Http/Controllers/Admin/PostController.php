<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Category;
use App\Model\user\Tag;
use Illuminate\Filesystem\Filesystem;
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
            'body' => 'required',
            'image' => 'required',
        ]);

        $post = new Post();
        if ($request->hasFile('image')) {
            $this->deleteImage($post->image);
            $post->image = $this->uploadImage($request->file('image'));
        }
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->status = $request->status;
        $post->save();
        $post->body = $this->getDescriptionAndImages($request->body, $request->slug);
        $post->save();

        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect()->route('post.index');
    }

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
            'body' => 'required',
        ]);
        //update post
        if ($request->hasFile('image')) {
            $this->deleteImage($post->image);
            $post->image = $this->uploadImage($request->file('image'));
        }
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $this->getDescriptionAndImages($request->body, $post->slug);
        $post->status = $request->status;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
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
        $this->deleteDescriptionImages($post->slug);
        $post->delete();
        return redirect()->back();
    }

    public function publish(Post $post)
    {
        $post->status = $post->status == 1 ? 0 : 1;
        $post->save();
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

        //save description image in database and return path
    public function getDescriptionAndImages($description, $slug)
    {
        if ($description == null) {
            return null;
        }

        $path = 'storage/post/' . $slug;
        if (!file_exists($path)) {
            $files = new Filesystem;
            $files->makeDirectory($path);
        }
        //Prepare HTML & ignore HTML errors
        $dom = new \domdocument();
        $dom->loadHtml($description, LIBXML_NOWARNING | LIBXML_NOERROR);

        //identify img element
        $images = $dom->getelementsbytagname('img');
        $image_names = [];
        //loop over img elements, decode their base64 source data (src) and save them to folder,
        //and then replace base64 src with stored image URL.
        foreach ($images as $k => $img) {

            //collect img source data
            $data = $img->getattribute('src');

            //checking if img source data is image by detecting 'data:image' in string
            if (strpos($data, 'data:image') !== false) {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                //decode base64
                $data = base64_decode($data);

                //naming image file
                $image_name = time() . rand(000, 999) . $k . '.png';
                // image path (path) to use upload file to
                $image_path = $path . '/' . $image_name;
                //image path (path2) to save to DB so that summernote can display image in edit mode (When editing summernote content) NB: the difference btwn path and path2 is the forward slash "/" in path2
                $path2 = '/storage/post/' .  $slug . '/' . $image_name;
                $image_names[] = $path2;
                file_put_contents($image_path, $data);
                // modify image source data in summernote content before upload to DB
                $img->removeattribute('src');
                $img->setattribute('src', $path2);
            } else {
                $image_names[] = $data; //if not data:image, just save the image source data to array // expected to be the image path of previous upload
            }
        }

        // to delete images on update if not in summernote content
        if ($image_names) {
            $saved_images = glob($path . '/*'); // get all file names saved in specified folder
            // remove the first / in image names to match the image path in storage
            foreach ($image_names as $key => $image_name) {
                $image_names[$key] = substr($image_name, 1);
            }
            // compare the file names in specified folder and the file names in summernote content
            $result = array_diff($saved_images, $image_names);
            foreach ($result as $image) {
                // delete the file if not in summernote content or  has been deleted in summernote content
                unlink($image);
            }
        } else {
            $this->deleteDescriptionImages($slug);
        }
        // final variable to store in DB
        $description = $dom->savehtml();
        return $description;
    }


    public function deleteDescriptionImages($slug)
    {
        $path = 'storage/post/' . $slug;
        if (file_exists($path)) {
            $files = new Filesystem;
            $files->deleteDirectory($path);
        }
    }
}
