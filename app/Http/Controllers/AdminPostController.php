<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function edit(Post $post){
        $posts = $post;
        return view('admin.posts.edit', compact('posts'));
    }

    public function update (Request $request, Post $post){

        $validate = $request->validate([
            'title' => ['required','min:5','max:255'],
            'content' => ['required','min:10'],
        ]);

        $post->update($validate);
        return to_route('admin');
    }

    public function destroy(Post $post){
        $post->delete();
        return to_route('admin');
    }
}
