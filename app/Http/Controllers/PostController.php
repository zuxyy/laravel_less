<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

//        $category = Category::find(2);
//        $post = Post::find(1);
//        $tag = Tag::find(2);

//        dd($posts->category);
//        dd($post->tags);
//        dump($tag->id);
//        dd($tag->posts);


        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => 'required|string',
            'image' => 'nullable|string',
            'category_id' => '',
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
//        $categories = Category::find($post);
////        dd($categories);
//   dd($post);

        return view('post.view', compact('post'));
    }

    public function edit(Post $post)
    {
//        $category = Category::find($post->id);
        $categories = Category::all();
//        dd($category);
        return view('post.edit', compact('post','categories'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => 'required|string',
            'image' => 'nullable|string',
            'category_id' => '',
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
        $post->forceDelete();
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
