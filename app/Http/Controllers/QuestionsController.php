<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;

class QuestionsController extends Controller
{
  public function index($rubric_id='')
  {
    if($rubric_id!=''){
      $items = Questions::where('topic_id', $rubric_id)->paginate(15);
    }else{
      $items = Questions::paginate(15);
    }
    return view('questions', ['items' => $items]);

  }
  public function show($id){
    $item = Questions::findOrFail($id);

  dd($item);
  }
}
