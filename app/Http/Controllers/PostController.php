<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $tag = Tag::find(1);
        dd($tag->posts);
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
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => 'required|string',
            'image' => 'nullable|string',
            'category_id' => '',
            'tags' => '',
        ], [
            'title.required' => 'Sarlavha kiritish majburiy!',
            'title.min' => 'Sarlavha kamida :min ta belgidan iborat bo‘lishi kerak.',
            'content.required' => 'Maqola matni kiritish majburiy!',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
//        dd($tags,$data);
        $post = Post::create($data);
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id,
//            ]);
//        } POSTGA TAGS larni qo'shganda posta alohida olib tagslarni post_tags jadvaliga qo'shish bir usuli

        $post->tags()->attach($tags); // agar $post->tags bo'lsa faqatgina array(massiv) qaytaradi agar $post->tags() bunda qavs() qo'shilsa query, yani bazaga so'rov jo'natiladi
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post','categories','tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => 'required|string',
            'image' => 'nullable|string',
            'category_id' => '',
            'tags' => ''
        ], [
            'title.required' => 'Sarlavha kiritish majburiy!',
            'title.min' => 'Sarlavha kamida :min ta belgidan iborat bo‘lishi kerak.',
            'content.required' => 'Maqola matni kiritish majburiy!',
        ]);

        $tags = $data['tags'] ?? [];

        unset($data['tags']);


        $post->update($data);
        $post->tags()->sync($tags);

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
