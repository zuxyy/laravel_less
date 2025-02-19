@extends('layout.main')
@section('content')
    <div>
        <div class="container-md">
            <div class="ask_a_question my-2 col-6">
                <form action="{{ route('question.store') }}" method="post">
                    @method('Post')
                    @csrf
                    <input type="text" name="username" id="" placeholder="Username" class="form-control mb-2">
                    <textarea type="text" name="question" class="form-control" placeholder="Ask a question"></textarea>
                    <button class="btn btn-success mt-2">Submit</button>
                </form>
            </div>
            <div class="row flex-column gap-3">
                @foreach($questions as $question)
                <div class="col-6">
                    <div class="card ">
                            <div class="card-head p-3 bg-info">
                                <h3>
                                    <a href="{{ route('questions.show', $question->id) }}" class="d-flex gap-3">

                                        <p>{{ $question->username }}: </p>
                                        <p>{{ $question->question }}</p>
                                    </a>
                                </h3>
                                <div class="answers_count">
                                    <p>Number of answers: {{ $question->answers_count }}</p>
                                </div>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
