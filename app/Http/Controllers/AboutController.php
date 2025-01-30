<?php

namespace App\Http\Controllers;

//use App\Models\Posts;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }
}
