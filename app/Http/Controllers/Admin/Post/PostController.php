<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\PostFilterRequest;
use App\Models\Post;
use Illuminate\Support\Number;
use Laravel\Sanctum\Guard;

class PostController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    public function index(PostFilterRequest $request){
        $this->authorize('index', auth()->user());
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(15);
//        $posts = Post::paginate(10);
//        Number::short($posts->total());
        return view('admin.post.index', compact('posts'));
    }
}
