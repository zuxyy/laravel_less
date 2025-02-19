@extends('layout.main')
@section('content')
    <div class="">
        @foreach($posts as $key => $post)
            <div class="d-flex gap-2">
                <div class="">{{ $key + 1 }}. {{ $post->title }}</div>
                <a href="{{ route('post.restorePost', $post->id) }}">Restore post</a>
            </div>
        @endforeach
            @if($hasDeletedPosts > 2)
                <a href="{{ route('post.restoreAllPost') }}">Restore All Post</a>
            @endif
    </div>

{{--    <div class="mb-2">--}}
{{--        <a href="{{ route('Post.edit', $Post->id) }}" class="btn btn-primary">Update</a>--}}
{{--    </div>--}}
{{--    <div class="mb-2">--}}
{{--        <form action="{{ route('Post.delete', $Post->id) }}" method="Post">--}}
{{--            @csrf--}}
{{--            @method("delete")--}}
{{--            <button class="btn btn-danger">Delete</button>--}}

{{--        </form>--}}
{{--    </div>--}}
    <div class="">
        <a href="{{ route('post.index') }}" class="btn btn-success">Back</a>
    </div>
@endsection
