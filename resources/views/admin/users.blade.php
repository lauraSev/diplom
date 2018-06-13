@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-right"><p>

                <a href="{{ URL::route('users-group-list', ['group'=>'U']) }}"  class="btn btn-info">{{ __('users.btn_list_user') }}</a>
                <a href="{{ URL::route('users-group-list', ['group'=>'A']) }}"  class="btn btn-info">{{ __('users.btn_list_admin') }}</a>
                <a href="{{ route('user-add') }}"  class="btn btn-primary">{{ __('users.add_btn') }}</a>
            </p></div>
        <table class="table table-striped">
            <tr>
                <th> {{ __('users.id') }}</th>
                <th> {{ __('users.name') }}</th>
                <th> {{ __('users.email') }}</th>
                <th> {{ __('users.created_at') }}</th>
                <th> {{ __('users.group') }}</th>
                <th colspan="2"></th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td><a name="u{{ $item->id }}" href="{{ URL::route('user-edit', $item) }}">{{ $item->id }}</a></td>
                    <td><a name="u{{ $item->id }}" href="{{ URL::route('user-edit', $item) }}">{{ $item->name }}</a></td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{__('users.group_'.$item->group)  }}</td>

                    <td><a href="{{ URL::route('user-edit', $item) }}"  class="btn btn-warning">&rarr;</a></td>
                    <td><a onclick="return confirm('{{ __('users.delete_confirm') }}')" href="{{ URL::route('user-delete', $item) }}"  class="btn btn-danger">X</a></td>

                </tr>
            @endforeach
        </table>
        {{ $items->links() }}
@endsection
