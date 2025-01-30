<?php

namespace App\Http\Controllers;

//use App\Models\Posts;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }
}
