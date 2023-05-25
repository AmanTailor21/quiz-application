<?php

namespace App\Http\Controllers;
use App\Models\Options;
use App\Models\Answer;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function addAnswer(){
        return view('answer');
    }

    public function fetchOptions(Request $request){
        $data = $request->all();
        $options = Options::where('question_id',$data['question_id'])->get();
        return $options;
    }

    public function storeAnswer(Request $request){
        $data = $request->all();
        Answer::create([
            'question_id' => $data['question'],
            'answer' => $data['answer'],
        ]);
        return back()->with('success', 'Answer is Attached with Question Successfully');
    }
}
