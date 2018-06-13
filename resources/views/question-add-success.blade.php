@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="alert-success">{{__('questions.addSuccess')}}</p>
    </div>
    <script language="javascript">
        setTimeout(function(){
            document.location='{{ URL::route('user-index', []) }}';
        },3000)
    </script>

@endsection
