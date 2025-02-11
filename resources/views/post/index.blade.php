@extends('layout.main')
@section('content')
    <div class="mb-2">
        <a href="{{ route('post.create') }}" class="btn btn-success">Create Post</a>
    </div>
    <div class="mb-2">
        <a href="{{ route('post.deletedPosts') }}" class="btn btn-success">Deleted Posts</a>
    </div>
    @foreach($posts as $post)
        <div class=""><a href="{{ route('post.show',$post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>
    @endforeach
@endsection
