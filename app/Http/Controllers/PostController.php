<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $posts = Post::where('user_id',\Auth::user()->id)->orderBy('id', 'desc');

        if ($request->has('search')){
            $sort_search = $request->search;
          $posts->where('name', 'like', '%'.$sort_search.'%');
          $posts->orWhere('content', 'like', '%'.$sort_search.'%');
        }

        $posts = $posts->paginate(15);

        return view('post.list', compact('posts', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:500',
        
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.posts.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $posts = new Post;
        $posts->name = $request->input('name');
        $posts->user_id = \Auth::user()->id;
        $posts->content = $request->input('content');
        $posts->save();

        return redirect()->route('user.posts');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $posts = Post::find(decrypt($id));

        return view('post.edit',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.posts.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $posts = Post::where('id',$id)->first();
        $posts->name = $request->input('name');
        $posts->user_id = \Auth::user()->id;
        $posts->content = $request->input('content');
        $posts->save();

        return redirect()->route('user.posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        if($posts)
        {
            $posts->delete();
        }
        return redirect()->route('user.posts');
    }


    public function BlogPage(Request $request)
    {
     
        $posts = Post::orderBy('id', 'desc');

        $posts = $posts->simplepaginate(8);

        return view('blogs', compact('posts'));
    }





}
