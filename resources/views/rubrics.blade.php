@extends('layouts.app_user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 col-sm-offset-2">
                <h3>{{ __('rubrics.h_rubrics')}}</h3>
                <ul class="list-group">
                    @foreach ($rubrics as $r)
                        <li class="list-group-item">
                            <a href="{{ URL::route('user-rubric-view', $r) }}">{{ $r->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
