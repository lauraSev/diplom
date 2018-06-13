@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-right"><p> <a href="{{ route('rubric-add') }}"  class="btn btn-primary">{{ __('rubrics.add_btn') }}</a></p></div>
    <table class="table table-striped">
        <tr>
            <th> {{ __('rubrics.id') }}</th>
            <th> {{ __('rubrics.name') }}</th>
            <th> {{ __('rubrics.count_question_all') }}</th>
            <th> {{ __('rubrics.count_question_publish') }}</th>
            <th> {{ __('rubrics.count_question_noanswer') }}</th>
            <th colspan="2"></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><a href="{{ URL::route('rubric-view', $item) }}">{{ $item->name }}</a></td>

                <td>{{ $item->cnt_all }}</td>
                <td>{{ $item->cnt_publish }}</td>
                <td>{{ $item->cnt_noanswer }}</td>

                <td><a href="{{ URL::route('rubric-edit', $item) }}"  class="btn btn-warning">&rarr;</a></td>
                <td><a onclick="return confirm('{{ __('rubrics.delete_confirm') }}')" href="{{ URL::route('rubric-delete', $item) }}"  class="btn btn-danger">X</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
