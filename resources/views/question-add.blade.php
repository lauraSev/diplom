@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h3>{{ __('rubrics.h_rubrics')}}</h3>
                <ul class="list-group">
                    @foreach ($rubrics_all as $r)
                        <li class="list-group-item @if($r['id']==$rubric_selected)  list-group-item-info @endif">
                            <a class=" "
                               href="{{ URL::route('user-rubric-view', $r) }}">{{ $r->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9">
            @auth
                <h1>{{ __('questions.add') }}</h1>
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
                                <option value="{{$ra['id']}}"
                                        @if($ra['id']==$rubric_selected) selected @endif>{{$ra['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{ __('questions.question') }}</label>
                        <textarea name="question" class="form-control" rows="3">{{ $question }}</textarea>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">{{__('messages.BtnSend')}}</button>
                </form>
            @else
                    <p>{{__('questions.noauth_form')}}</p>
            @endauth

            </div>
        </div>
    </div>
@endsection
