<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests;

class AdminPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StorePostRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {
            $input['post_image'] = $this->photoUpload($request);
        }

        $post = new Post($input);

        \Auth::user()->posts()->save($post);

        return redirect('admin/posts')->with('message', 'Post successfully created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::lists('name', 'id');
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {
            $input['post_image'] = $this->photoUpload($request);
        }

        $post->update($input);

        return redirect('admin/posts')->with('message', 'Post successfully updated!');
    }



    private function photoUpload($request)
    {
        $image_file = $request->file('image_file');
        $image_name = time() . '_' . $image_file->getClientOriginalName();
        $destinationPath = public_path('images/posts');

        Image::make($image_file->getRealPath())->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$image_name);

        return $image_name;
    }



    public function confirm($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.confirm', compact('post'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (file_exists($post->PostImagePath)) {
            \File::delete($post->PostImagePath);
        }
        $post->delete();

        return redirect('admin/posts')->with('message', 'Post successfully deleted!');
    }
}
