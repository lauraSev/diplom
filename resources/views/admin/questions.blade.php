@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>Русская литература</h2>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12"><hr></div>
        </div>
        <div class="row">
            <div class="col-md-4">

                <h3>Русская литература</h3>
                <h3><a href="/">Британская литература</a></h3>
                <h3><a href="/">Немецкая литература</a></h3>
                <h3><a href="/">Американская литература</a></h3>
                <h3><a href="/">Японская литература</a></h3>
            </div>
            <div class="col-md-8">

                <h1>Задайте ваш вопрос:</h1>
                <div>&nbsp;</div>
                <textarea placeholder="Введите вопрос" class="form-control" rows="3"></textarea>
                <div>&nbsp;</div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </div>



    <a href="{{ route('show_rubrics') }}">Rubrics</a>

    <h4>{{ $item->id }} {{ $item->rubric->name }}  от {{$item->date_answer}}</h4>
       <p>{{ $item->question }}   {{ $item->answer }}</p>


@endsection
