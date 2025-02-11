@extends('layout.main')
@section('content')
    <div class="">



        <div class="">{{ $post->id }}. {{ $post->title }}</div>
        <div class="">{{ $post->content }}</div>
    </div>

    <div class="mb-2">
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Update</a>
    </div>
    <div class="mb-2">
        <form action="{{ route('post.delete', $post->id) }}" method="post">
            @csrf
            @method("delete")
            <button class="btn btn-danger">Delete</button>

        </form>
    </div>
    <div class="">
        <a href="{{ route('post.index') }}" class="btn btn-success">Back</a>
    </div>
@endsection
