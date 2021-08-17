@extends('layout.app')
@section('content')
    @foreach ($questions as $question)
    <hr>
        Category {{$question->category->category}}<br>
        Question {{$question->question}}<br>
        options @foreach ($question->options as  $opt)
            <li>{{$opt->option}}</li>
        @endforeach
        
    @endforeach
@endsection
