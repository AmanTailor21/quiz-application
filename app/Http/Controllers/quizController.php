<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class quizController extends Controller
{
    public function getQuestions($id){
      if(isset($id) && $id != null){
        return $question = Question::with('options')->where('question_id',$id)->first();
      }
      return $question = false;
    }
}
