
@foreach ($items as $item)
    <h4>{{ $item->id }} {{ $item->rubric->name }}  от {{$item->date_answer}}</h4>
       <p>{{ $item->question }}   {{ $item->answer }}</p>
@endforeach
{{$items->links()}}
