<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class PostControllerWithModel extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $posts = Post::all();

        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
           return to_route ('login');
        }
    
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $validate = $request->validate([
                'title' => ['required','min:5','max:255'],
                'content' => ['required','min:10'],
            ]);

        //     $validate['user_id'] = Auth::id();

        // Post::create($validate);

        Auth::user()->posts()->create($validate);

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // return view('posts.show',['post'=>$post]);
        $post = Post::findOrFail($id);
        return view('posts.show', ['posts' => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update',$post);
        if($post->user_id !== Auth::id()){
            abort(403);
        } else {

        }
        // return view('posts.edit',['post'=>$post]);
        return view('posts.edit', ['posts' => $post]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Gate::authorize('update',$post);
        $validate = $request->validate([
            'title' => ['required','min:5','max:255'],
            'content' => ['required','min:10'],
        ]);

        $post->update($validate);
        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        Gate::authorize('delete',$post);

        if($post->user_id !== Auth::id()){
            abort(403);
        } else {
            $post->delete();
        }
        return to_route('posts.index');
    }
}
