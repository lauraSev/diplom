@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="{{ route('users') }}">{{ __('users.all') }}</a></p>
        <h1>{{ __('users.'.$item->action) }}</h1>
        <hr>
        @if ($item->message!='')
            <p class="bg-success">{{ __('users.'.$item->message) }}</p>
        @endif
        <form role="form" action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('users.name') }}</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('users.email') }}</label>
                <input type="email" name="email" class="form-control" id="name" value="{{ $item->email }}" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('users.new_password') }}</label>
                <input type="password" name="password" class="form-control" id="name" value="" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('users.group') }}</label>
                <select class="form-control" name="group">
                    @foreach($group_all as $g)
                        <option value="{{$g}}" @if($g==$item->group) selected @endif>{{ __('users.group_'.$g) }}</option>
                    @endforeach
                </select>
            </div>
            @if ($item->created_at!='')
                <div class="form-group">
                    <label for="exampleInputPassword1">{{ __('users.created_at') }}: {{$item->created_at}}</label>
                </div>
            @endif
            @if ($item->updated_at!='')
                <div class="form-group">
                    <label for="exampleInputPassword1">{{ __('users.updated_at') }}: {{$item->updated_at}}</label>
                </div>
            @endif
            <button type="submit" name="save" class="btn btn-primary">Отправить</button>
        </form>
    </div>


@endsection
