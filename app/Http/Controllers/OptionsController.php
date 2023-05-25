<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Options;

class OptionsController extends Controller
{
    public function addOptions(){
      return view('options');
    }

    public function storeOptions(Request $request)
    {
      $data = $request->all();
      for ($k = 1 ; $k < 5; $k++){
          Options::create([
              'question_id' =>$data['question'],
              'options' => $data['option_'.$k]
          ]);
      }
      return back()->with('success', 'Options Attached Successfully');
    }
}
