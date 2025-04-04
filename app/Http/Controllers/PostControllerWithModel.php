<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostControllerWithModel extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = 'Aifred';
        $age = 32;
        $posts = [
            'post 1',
            'post 2',
            'post 3',
            'post 4',
        ];

        return view('posts.index',['name'=> $name, 'age' => $age, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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

        Post::create($validate);

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // return view('posts.show',['post'=>$post]);
        return view('posts.show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // return view('posts.edit',['post'=>$post]);
        return view('posts.edit');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
