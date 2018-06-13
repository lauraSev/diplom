@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="{{ route('rubric-index') }}">{{ __('rubrics.all') }}</a> / <a href="{{ URL::route('rubric-view', $rubric) }}">{{$rubric->name }}</a></p>
        <h1>{{ __('questions.'.$item->action) }}</h1>
        <hr>
        @if ($message!='')
            <p class="bg-success">{{ __('questions.'.$message) }}</p>
        @endif
        <form role="form" action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('rubrics.name') }}</label>
                <select class="form-control" name="topic_id">
                    @foreach($rubrics_all as $ra)
                        <option value="{{$ra['id']}}" @if($ra['id']==$item['topic_id']) selected @endif>{{$ra['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ __('questions.question') }}</label>
                <textarea name="question" class="form-control" rows="3">{{ $item->question }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ __('questions.answer') }}</label>
                <textarea name="answer" class="form-control" rows="3">{{ $item->answer }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ __('questions.status') }}</label>
                <select  class="form-control" name="status">
                    @foreach (['P','W','H'] as $st)
                        <option value="{{$st}}" @if($st==$item['status']) selected @endif >{{ __('questions.status_'.$st) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('rubrics.created_by') }}</label>
                <select class="form-control" name="created_by">
                    @foreach($users_all as $ua)
                        <option value="{{$ua['id']}}" @if($ua['id']==$item['created_by']) selected @endif>{{$ua['name']}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Отправить</button>
        </form>


    </div>

@endsection
