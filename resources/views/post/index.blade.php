@extends('layout.main')
@section('content')
    @foreach($posts as $post)
        <div class=""><a href="{{ route('post.show',$post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>
    @endforeach
@endsection
