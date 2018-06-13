@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="{{ route('rubric-index') }}">{{ __('rubrics.all') }}</a></p>
        <hr>
        @if ($item->message!='')
            <p class="bg-success">{{ __('rubrics.'.$item->message) }}</p>
        @endif
        <form role="form" action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('rubrics.name') }}</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}" placeholder="{{ __('rubrics.name') }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ __('rubrics.description') }}</label>
                <textarea name="description" class="form-control" rows="3">{{ $item->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ __('rubrics.created_at') }}: {{$item->created_at}}</label>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ __('rubrics.updated_at') }}: {{$item->updated_at}}</label>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Отправить</button>
        </form>
    </div>


@endsection
