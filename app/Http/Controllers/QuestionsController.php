<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionsController extends Controller
{
    public function addQuestions(){
      return view('questions');
    }

    public function storeQuestions(Request $request){
      $data = $request->all();
      Question::create([
          'question' => $data['questions']
      ]);
      return back()->with('success', 'Question Added Successfully');
    }

    public function fetchQuestions(){
      $data = Question::with('options')->get();
      return $data;
    }
}
