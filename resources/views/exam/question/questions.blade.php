@extends('layout.app')
@section('content')
    <form method="post" action="{{route('fetch_questions')}}">
        @csrf

        <label> Select exam</label>
        <select class="form-control" name="exam" required>
            <option value="">--select</option>
            @foreach ($exams as $exam )
            <option value="{{$exam->id}}">{{$exam->exam}}</option>
            @endforeach}
        </select>
        <button type="submit">Next</button>
    </form>
@endsection
