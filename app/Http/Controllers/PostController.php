<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        //select * from posts;
        $allPosts = Post::all();

        return view('posts.index',[
            'posts' => $allPosts,
        ]);
    }

    public function create()
    {
        $users = User::get();

        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        //get me the form submission data
//        $data = request()->all();
//
//        $title = $data['title'];
//        $description = $data['description'];
//

//        $title = request()->title;
//        $description = request()->description;

        $data = $request->all();

        $title = $data['title'];
        $description = $data['description'];
        $userId = $data['post_creator'];

        //store the form data inside the database
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
        ]);

        return to_route('posts.index');
    }

    public function show($postId)
    {
//        $allJavascriptPosts = Post::where('title', 'Javascript')->get();
//        dd($allJavascriptPosts);

//        $result = Post::where('id', $postId)->get(); //return Collection object
//        dd($result);
//        $post = Post::where('id', $postId)->first(); //return App\Models\Post object
        $post = Post::find($postId);
        dd($post);
        return view('posts.show');
    }
}
