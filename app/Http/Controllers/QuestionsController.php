<?php

namespace App\Http\Controllers;

use App\Rubrics;
use Illuminate\Http\Request;
use App\Questions;
use Symfony\Component\Console\Question\Question;

class QuestionsController extends Controller
{
    public function index($rubric_id = '')
    {
        $aTpl = [];
        if ($rubric_id != '') {
            $aTpl['questions'] = Questions::where('topic_id', $rubric_id)->where('status','P')->paginate(15);
        } else {
            $aTpl['questions'] = Questions::where('status','P')->paginate(15);
        }
        $aTpl['rubric_selected'] = $rubric_id;
        $aTpl['rubrics'] = Rubrics::all();
        return view('questions', $aTpl);

    }

    public function add($rubric_id = '')
    {
        if(\request()->method()=='POST' && \Auth::check()){
            $q = new Questions;
            $q->question = \request()->get('question');
            $q->status='W';
            $q->created_by=\Auth::user()->id;
            $q->topic_id=$rubric_id;
            $q->save();

            return redirect()->route('question-add-success',$q);
        }
        $aTpl = [];
        $aTpl['rubrics_all']= Rubrics::all();
        $aTpl['rubric_selected'] = $rubric_id;
        $aTpl['message']='';
        $aTpl['question']=\request()->get('question');
        return view('question-add', $aTpl);
    }

    public function show($id)
    {
        $item = Questions::findOrFail($id);

        dd($item);
    }
}
