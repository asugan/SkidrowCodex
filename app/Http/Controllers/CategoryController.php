<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $postrecommended = Post::where('recommended', '1')->get();
        $category = Category::all();

        return view('index', compact('posts', 'postrecommended', 'category'));
    }

    public function show(Post $post, Comment $comment)
    {
        $comment->post_id = $post->id;
        $comment = Comment::where('post_id', $comment->post_id)->paginate(5);

        return view('postpage', [
            'posts' => $post,
        ], compact('comment'));
    }

    public function save_comment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required'
        ]);
        $data = new Comment;
        $data->post_id = $post->id;
        $data->content = $request->content;
        $data->name = $request->name;
        $data->save();
        return redirect()->back()->with('message', 'Message sent succesfully !!!');
    }

    public function catcat(Category $category)
    {
        $post = $category->post()->paginate(9);

        return view('categora')->with(['category' => $category, 'post' => $post]);
    }
}