<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\PostFilterRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
//    public $service;
    public function index(PostFilterRequest $request)
    {


//        dd($data);

//        $query = Post::query();

//        if (!empty($data['category_id'])) {
//            $query->where('category_id', $data['category_id']);
//        }
//
//        if (!empty($data['title'])) {
//            $query->where('title', 'like', '%' . $data['title'] . '%');
//        }
//
//        if (!empty($data['content'])) {
//            $query->where('content', 'like', '%' . $data['content'] . '%');
//        } Filter

//        $posts = $query->get();

        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
//        dd($filter);
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);


        return PostResource::collection($posts);

//        $posts = Post::paginate(10);
//        return view('post.index', compact('posts'));
    }

    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();


        return view('post.create', compact('categories', 'tags'));
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();
//        dd($data);

//        dd('gg');
//        $this->service->storePost($data);
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $Post->id,
//            ]);
//        } POSTGA TAGS larni qo'shganda posta alohida olib tagslarni post_tags jadvaliga qo'shish bir usuli
        if (!empty($tags)) {
            $tags = $data['tags'];
        }
        unset($data['tags']);
        $post = Post::create($data);
        if (!empty($tags)) {
            $post->tags()->attach($tags); // agar $Post->tags bo'lsa faqatgina array(massiv) qaytaradi agar $Post->tags() bunda qavs() qo'shilsa query, yani bazaga so'rov jo'natiladi
        }

//        $arr = [
//            'title' => $post->title,
//            'content' => $post->content,
//            'image' => $post->image,
//        ];
//
//        return $arr;

        return new PostResource($post);

//        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
//        $categories = Category::find($Post);
////        dd($categories);
//   dd($Post);

        return view('post.view', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {

        $data = $request->validated();

        $tags = $data['tags'] ?? [];

        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        $post = $post->fresh();
        return new PostResource($post);
//        return redirect()->route('post.show', $post->id);
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
