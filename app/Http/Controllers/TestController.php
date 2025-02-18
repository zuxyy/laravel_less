<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        foreach ($posts as $post){
            dump($post->title);
        }
    }

    public function create()
    {
        $arr = [
            [
                'title' => "another title",
                'content' => "another Content",
                'image' => "another_image.png",
                'likes' => 1000,
                'status' => 1,
            ],
            [
                'title' => "Kun.uz title",
                'content' => "kun.uz Content",
                'image' => "kunUz_image.png",
                'likes' => 12,
                'status' => 1,
            ],
        ];
//        foreach ($arr as $item){
//            dump($item['title']);
//        }
        foreach ($arr as $item){
            Post::create([
                'title' => $item['title'],
                'content' => $item['content'],
                'image' => $item['image'],
                'likes' => $item['likes'],
                'status' => $item['status'],
            ]);
        }
//        Post::create([
//            'title' => "second_title",
//            'content' => "second Content",
//            'image' => "second_image.png",
//            'likes' => 100,
//            'status' => 0,
//        ]);

        return "created";
    }

    public function update()
    {
        $post = Post::find(2);
        $post->update([
            'title' => "second_title",
            'content' => "second Content",
            'image' => "second_image.png",
            'likes' => 100,
            'status' => 0,
        ]);
    }

    public function delete()
    {
//        $Post = Post::find(3);
//        $Post->delete($Post);
        // DELETE QILINGANLARNI QAYTARISH
//        $Post = Post::withTrashed()->find(3);
//        $Post->restore($Post);
    }
    // First or Create , BAZADAN TEKSHIRIB AGAR BO'LMASA CREATE QILISH UCHUN KERAKLI FUNCTION
    public function firstOrCreate()
    {

        $anotherPost = [
            'title' => "second_title",
            'content' => "second Content",
            'image' => "second_image.png",
            'likes' => 100,
            'status' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'almashgan title' // qidiruv joyi
        ],[
            // agar topolmasa create qiluvchi joyi
            'title' => "almashgan title",
            'content' => "almashgan content",
            'image' => "boshqa.png",
            'likes' => 10000,
            'status' => 1,
        ]);

        dump($post->content);
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => "second_title",
            'content' => "second Content",
            'image' => "second_image.png",
            'likes' => 100,
            'status' => 1,
        ];

        $post = Post::updateOrCreate([
            'title' => "some title", // QIDIRUVCHI JOYI
        ],[
            // AGAR QIDIRGAN JOYIDAN BAZADA TOPSA UDPATE QILADI YOKI PASDAGINI CREATE QILADI
            'title' => "3-Title",
            'content' => "uchinchi Content",
            'image' => "uchinchi_image.png",
            'likes' => 100000,
            'status' => 1,
        ]);

    }
}
