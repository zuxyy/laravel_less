<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::withCount('answers')->get();
//        dd($questions);
//        $questions->answers()->count();
        return view('questions.index', compact('questions'));
    }

    public function show(Question $question){
//      $question->answers;

        return view('questions.view', compact('question'));
    }

    public function store(){
        $data = request()->validate([
            'username' => 'string|required',
            'question' => 'string|required',
        ]);
        Question::create($data);
        return redirect()->back();
    }
}
