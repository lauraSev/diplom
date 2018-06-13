<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rubrics;


class RubricsController extends Controller
{
    public function index()
    {
        $q_cont = new \App\Http\Controllers\Admin\QuestionsController();
        $items = Rubrics::paginate(15);
        foreach ($items as $k=>$item){
            $items[$k]['cnt_all'] =$q_cont->cnt($item['id'],'all');
            $items[$k]['cnt_publish'] =$q_cont->cnt($item['id'],'publish');
            $items[$k]['cnt_noanswer'] =$q_cont->cnt($item['id'],'noanswer');
        }
        return view('admin.rubrics', ['items' => $items]);

    }

    public function delete($id){
        Rubrics::where('id', $id)->delete();
        $q_cont = new \App\Http\Controllers\Admin\QuestionsController();
        $q_cont->onTopicDelete($id);
        return redirect()->route('rubric-index');
    }

    public function edit($id)
    {
        $message='';
        if(\request()->method()=='POST'){
            Rubrics::where('id', $id)->update(['name'=>\request()->get('name'),'description'=>\request()->get('description')]);
            $message = 'upd_success';
        }
        $item = Rubrics::where('id', $id)->get();
        if($message!=''){
            $item[0]['message']=$message;
        }
        $item[0]['action']='edit';
        return view('admin.rubrics-edit', ['item' => $item[0]]);
    }

    public function add()
    {
        if(\request()->method()=='POST'){
            $r = new Rubrics();
            $r->name = \request()->get('name');
            $r->description = \request()->get('description');
            $r->save();
            return redirect()->route('rubric-edit',$r);
        }
        $empty = (object)[];
        $empty->name='';
        $empty->description='';
        $empty->created_at='';
        $empty->updated_at='';
        $empty->message='';
        $empty->action = 'add';
        return view('admin.rubrics-edit', ['item' => $empty]);

    }
    public function view($id)
    {

    }

}
