@extends('layouts.app')

@section('content')

    @foreach ($items as $item)
        <p>
            {{ $item->id }}
            {{ $item->name }}
        </p>
                    кнопка новая тема
        таблицу со столбцами
        название(ссылкой)
        сколько всего вопросов
        сколько опубликовано
        сколько без ответов
        кнопка редактировать
        кнопка удалить
    @endforeach



@endsection
