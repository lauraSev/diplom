<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Questions;
use App\Rubrics;
use App\User;

class QuestionsController extends Controller
{
    public function onTopicDelete($rubric_id)
    {
        $q = Questions::where('topic_id', $rubric_id)->delete();
    }

    public function cnt($rubric_id, $type)
    {
        $q = Questions::where('topic_id', $rubric_id);
        switch ($type) {
            case 'publish':
                $q->where('status', 'P');
                break;
            case 'noanswer':
                $q->where('status', 'W');
                break;
        }
        $items = $q->count();
        return $items;
    }


    public function status($id){
        Questions::where('id', $id)->update(['status'=>\request()->get('s')]);
        return redirect()->back();
    }

    public function index($rubric_id = '')
    {
        $arTpl = [];
        if ($rubric_id != '') {
            $arTpl['items'] = Questions::where('topic_id', $rubric_id)->paginate(15);
        } else {
            $arTpl['items'] = Questions::where('answer','')->orderBy('created_at','desc')->paginate(15);
        }
        foreach ($arTpl['items'] as $k=>$item){
            $arTpl['items'][$k]['created_by_user'] = User::find($item['created_by']);
            $arTpl['items'][$k]['checked_by_user'] = User::find($item['checked_by']);

        }
        if($rubric_id>0){
            $arTpl['rubric'] =Rubrics::where('id',$rubric_id)->get()[0];
        }else{
            $arTpl['rubric'] =['name'=>''];
        }
        return view(  'admin.questions', $arTpl);
    }


    public function show($id)
    {
        $item = Questions::findOrFail($id);
        return view('admin.questions', ['item' => $item]);
    }
    public function delete($id){
        Questions::where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $arTpl =['message'=>''];
        $message='';
        if(\request()->method()=='POST'){
            Questions::where('id', $id)->update([
                'topic_id'=>\request()->get('topic_id'),
                'question'=>\request()->get('question'),
                'answer'=>\request()->get('answer'),
                'status'=>\request()->get('status'),
                'created_by'=>\request()->get('created_by'),
                'checked_by'=>\Auth::user()->id,
                'date_answer'=>date('Y-m-d H:i:s'),
            ]);
            $arTpl['message'] = 'upd_success';
        }
        $item = Questions::where('id', $id)->get();
        $item[0]['action']='edit';

        $arTpl['item'] = $item[0];
        $arTpl['rubric'] =Rubrics::where('id',$arTpl['item']['topic_id'])->get()[0];
        $arTpl['rubrics_all'] =Rubrics::all(['id','name']);
        $arTpl['users_all'] =User::all(['id','name']);
        return view('admin.question-edit', $arTpl);
    }

}
