@extends('layout.main')
@section('content')
    <div class="">
        <div class="mb-2">
            <a href="{{ route('post.create') }}">Create Post</a>
        </div>
        <div class="">{{ $post->id }}. {{ $post->title }}</div>
        <div class="">{{ $post->content }}</div>
    </div>

    <div class="">
        <a href="{{ route('post.index') }}">Back</a>
    </div>
@endsection
