<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Questions;
use App\Rubrics;
use App\User;

class UsersController extends Controller
{
    public function index($group='')
    {
        if($group=='')
            $arTpl = ['items'=>User::query()->paginate(15)];
        else
            $arTpl = ['items'=>User::where('group',$group)->paginate(15)];
        return view('admin.users', $arTpl);
    }


    public function show($id)
    {
        $item = Questions::findOrFail($id);
        return view('admin.questions', ['item' => $item]);
    }
    public function delete($id){
        Questions::where('created_by', $id)->delete();
        User::where('id',$id)->delete();
        return redirect()->back();
    }
    public function add()
    {
        if(\request()->method()=='POST'){
            $r = new User();
            $r->name = \request()->get('name');
            $r->email = \request()->get('email');
            $r->group = \request()->get('group');
            $r->password = \Hash::make(\request()->get('password'));
            $r->save();
            return redirect()->route('user-edit',$r);
        }
        $empty = (object)[];
        $empty->name='';
        $empty->email='';
        $empty->group='';
        $empty->updated_at='';
        $empty->created_at='';
        $empty->message='';
        $empty->action = 'add';
        $arTpl = ['item' => $empty];
        $arTpl['group_all'] =['U','A'];
        return view('admin.user-edit',$arTpl );

    }
    public function edit($id)
    {
        $arTpl =['message'=>''];
        $message='';
        if(\request()->method()=='POST'){
            $arUpd = [
                'name'=>\request()->get('name'),
                'email'=>\request()->get('email'),
                'group'=>\request()->get('group'),
            ];
            $pwd = \request()->get('password');
            if($pwd!='')$arUpd['password'] = \Hash::make($pwd);
            User::where('id', $id)->update($arUpd);
            $arTpl['message'] = 'upd_success';
        }
        $item = User::where('id', $id)->get();
        $item[0]['action']='edit';

        $arTpl['item'] = $item[0];
        $arTpl['group_all'] =['U','A'];
        return view('admin.user-edit', $arTpl);
    }

}
