<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(AnswerRequest $request)
    {
        Answer::create([
            'question_id' => $request->question_id,
            'answer' => $request->answer,
            'username' =>$request->username,
        ]);

        return redirect()->back();
    }
}
