@extends('layouts.app_user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h3>{{ __('rubrics.h_rubrics')}}</h3>
                <ul class="list-group">
                    @foreach ($rubrics as $r)
                        <li class="list-group-item @if($r['id']==$rubric_selected)  list-group-item-info @endif">
                            <a class=" "
                               href="{{ URL::route('user-rubric-view', $r) }}">{{ $r->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-10">
                        @foreach ($rubrics as $r)
                            @if($r['id']==$rubric_selected) <h2>{{ $r->name }}</h2>  @endif

                        @endforeach
                    </div>

                        @auth
                        <div class="col-sm-2">
                            <a href="{{ URL::route('user-question-add', [$rubric_selected]) }}" class="btn btn-primary">{{__('messages.AddQuestion')}}</a>
                        </div>
                        @else
                        <div class="col-sm-12">
                            <p class="list-group-item list-group-item-info">{{__('messages.AddQuestionMsg')}}</p>
                        </div>
                        @endauth


                    <table class="table table-striped">
                        <tr>
                            <th> {{ __('questions.question') }}</th>
                            <th> {{ __('questions.answer') }}</th>
                        </tr>
                        @foreach ($questions as $q)
                            <tr>
                                <td>{{ $q->question }}</td>
                                <td>{{ $q->answer }}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection


