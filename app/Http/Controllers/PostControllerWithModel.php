<?php

namespace App\Http\Controllers;

use App\Mail\PostMail;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendNewPostMailJOb;
use Illuminate\Support\Facades\Cache;



class PostControllerWithModel extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $posts = Post::all();
        // $posts = Post::paginate(3);

        // if(Cache::has('posts')){
        //     $posts = Cache::get('posts');
        // } else {
        //     sleep(4);
        //     $posts = Post::paginate(3);
        //     Cache::put('posts',$posts, 10);
        // }

        $posts = Cache::remember('posts', 10, function(){
            sleep(4);
            return Post::paginate(3);
        });

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
                'thumbnail' =>['required','image'],
            ]);

            $validate['thumbnail'] = $request->file('thumbnail')->store('thumbnails');


        //     $validate['user_id'] = Auth::id();

        // Post::create($validate);

        Auth::user()->posts()->create($validate);

        dispatch(new SendNewPostMailJOb(['email' => Auth::user()->email, 'name' => Auth::user()->name, 'title'=> $validate['title']]));

        // Mail::to(auth()->user()->email)->send(new PostMail());


        return to_route('posts.index')->with('message', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        // return view('posts.show',['post'=>$post]);
        $post = Post::findOrFail($id);
        return view('posts.show', ['posts' => $post]);

         // try{
        //     $post = Post::findOrFail($id);
        //          // return view('posts.show',['post'=>$post]);
        // $post = Post::findOrFail($id);
        // return view('posts.show', ['posts' => $post]);
        // } catch (ModelNotFoundException $e){
        //     return $e->getMessage();
        // }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update',$post);
        // if($post->user_id !== Auth::id()){
        //     abort(403);
        // } else {

        // }
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
            'thumbnail' =>['sometimes','image'],
        ]);

        if($request->hasFile('thumbnail')){
            $path = storage_path('app/public/'.$post->thumbnail);
            File::delete(storage_path('app/public/'.$post->thumbnail));
            logger('Trying to delete: ' . $path);
            $validate['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }
        $post->update($validate);
        return to_route('posts.index')->with('message', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        Gate::authorize('delete',$post);
        File::delete(storage_path('app/public/'.$post->thumbnail));
        $post->delete();
        // if($post->user_id !== Auth::id()){
        //     abort(403);
        // } else {
        //     $post->delete();
        // }
        return to_route('posts.index');
    }
}
