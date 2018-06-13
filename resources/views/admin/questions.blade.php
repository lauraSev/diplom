@extends('layouts.app')

@section('content')
    <div class="container">
        @if($rubric['name']!='')
            <p><a href="{{ route('rubric-index') }}">{{ __('rubrics.all') }}</a></p>
            <h1>{{ __('questions.h1')}}: {{$rubric['name'] }}</h1>
        @else
            <h1>{{ __('questions.no_answered')}}</h1>
        @endif
        <hr>
        <table class="table table-striped">
            <tr>
                <th> {{ __('questions.id') }}</th>
                <th> {{ __('questions.question') }}</th>
                <th> {{ __('questions.answer') }}</th>
                <th> {{ __('questions.status') }}</th>
                <th> {{ __('questions.date_answer') }}</th>
                <th> {{ __('questions.created_by') }}</th>
                <th> {{ __('questions.checked_by') }}</th>
                <th colspan="2"></th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td><a name="q{{ $item->id }}" href="{{ URL::route('question-edit', $item) }}">{{ $item->id }}</a></td>
                    <td>{{ $item->question }}</td>
                    <td>{{ $item->answer }}</td>
                    <td>
                        <select onchange="document.location='#q{{ $item->id }}'; document.location='{{ URL::route('question-status', $item) }}?s='+this.value">
                        @foreach (['P','W','H'] as $st)
                            <option value="{{$st}}" @if($st==$item->status) selected @endif >{{ __('questions.status_'.$st) }}</option>
                        @endforeach
                        </select>
                    </td>
                    <td>{{ $item->date_answer }}</td>
                    <td>{{ $item->created_by_user['name'] }} {{$item->created_at}}</td>
                    <td>{{ $item->checked_by_user['name'] }} {{$item->updated_at}}</td>

                    <td><a href="{{ URL::route('question-edit', $item) }}"  class="btn btn-warning">&rarr;</a></td>
                    <td><a onclick="return confirm('{{ __('questions.delete_confirm') }}')" href="{{ URL::route('question-delete', $item) }}"  class="btn btn-danger">X</a></td>
                </tr>
            @endforeach
        </table>
        {{ $items->links() }}
@endsection
