<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        $posts = Post::all();

        $category = Category::find(1);
        $posts = Post::find(2);
        dd($posts->category);
        dd($category->posts);

        //return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => 'required|string',
            'image' => 'nullable|string',
        ], [
            'title.required' => 'Sarlavha kiritish majburiy!',
            'title.min' => 'Sarlavha kamida :min ta belgidan iborat bo‘lishi kerak.',
            'content.required' => 'Maqola matni kiritish majburiy!',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.view', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => 'required|string',
            'image' => 'nullable|string',
        ], [
            'title.required' => 'Sarlavha kiritish majburiy!',
            'title.min' => 'Sarlavha kamida :min ta belgidan iborat bo‘lishi kerak.',
            'content.required' => 'Maqola matni kiritish majburiy!',
        ]);

        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    # CUSTOM METHOD
    public function deletedPosts()
    {
        $posts = Post::onlyTrashed()->get(); // Faqat o‘chirilgan postlarni olish
        $hasDeletedPosts = $posts->count(); // O'chirilgan postlar borligini tekshirish

        return view('post.deletedPosts', compact('posts', 'hasDeletedPosts'));
    }


    public function restoreDeletedPost($post)
    {
        $post = Post::withTrashed()->find($post);
        $post->restore();
        return redirect()->route('post.deletedPosts');
    }

    public function restoreAllPost()
    {
        $allPost = Post::onlyTrashed()->restore(); // Faqat o‘chirilgan postlarni tiklash
        return redirect()->route('post.deletedPosts');
    }


}
