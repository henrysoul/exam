@extends('layout.app')
@section('content')
    Question 
    <hr><br>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
        Create Question
    </button>
    @include('partials.alerts')
    <table>
        <tr>
            <th>Exam</th>
            <th>Category</th>
            <th>Question</th>
            <th>Options</th>
            <th>Action</th>
        </tr>
            @foreach ($questions as $ques)
                <tr>
                    <td>{{ $ques->exam->exam }}</td>
                    <td>{{ $ques->category->category }}</td>
                    <td>{{ $ques->question }}</td>
                    <td>@foreach ($ques->options as $opt )
                        <li>{{$opt->option}}</li>
                    @endforeach</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li data-bs-toggle="modal" data-bs-target="#edit{{ $ques->id }}"><a
                                        class="dropdown-item">Edit</a></li>
                                <li><a class="dropdown-item" onclick="return confirm('Are you sure?')"
                                        href="{{ route('question_delete', $ques->id) }}">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <!-- Create edit -->
                <div class="modal fade" id="edit{{ $ques->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            {{-- <div class="modal-body">
                                <form method="post" action="{{ route('category_update') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="category" name="category"
                                            value="{{ $ques->category }}" required>
                                    </div>

                            </div> --}}
                            <div class="modal-footer">
                                <input type="hidden" value="{{ $ques->id }}" name="id" />
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
    </table>

    <!-- Create category -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('questions_store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Exam</label>
                            <select class="form-control" name="exam" required>
                                <option value="">--select--</option>
                                @foreach ($exams as $exam )
                                    <option value="{{$exam->id}}">{{$exam->exam}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Question category</label>
                            <select class="form-control" name="category" required>
                                <option value="">--select--</option>
                                @foreach ($categories as $cat )
                                    <option value="{{$cat->id}}">{{$cat->category}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Options 1</label>
                            <input type="text" class="form-control" id="" name="options[]" required>
                            <label for="exampleFormControlInput1" class="form-label">Options 2</label>
                            <input type="text" class="form-control" id="" name="options[]" required>
                            <label for="exampleFormControlInput1" class="form-label">Options 3 </label>
                            <input type="text" class="form-control" id="" name="options[]" required>
                            <label for="exampleFormControlInput1" class="form-label">Options 4</label>
                            <input type="text" class="form-control" id="" name="options[]" required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
