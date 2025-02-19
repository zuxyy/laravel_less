<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\AnswerRequest;
use App\Models\Answer;

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
