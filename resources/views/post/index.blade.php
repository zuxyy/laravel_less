@extends('layout.main')
@section('content')
    <div class="mb-2">
        <a href="{{ route('post.create') }}" class="btn btn-success">Create Post</a>
    </div>
    <div class="mb-2">
        <a href="{{ route('post.deletedPosts') }}" class="btn btn-success">Deleted Posts</a>
    </div>
{{--    @foreach($posts as $post)--}}
{{--        <div class=""><a href="{{ route('post.show',$post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>--}}
{{--    @endforeach--}}
    <table class="table table-bordered w-50 table-primary table-hover text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
        <tr>
            <td>
                {{ $key +1 }}.
            </td>
            <td>

                <a href="{{ route('post.show',$post->id) }}"> {{ $post->title }}</a>
            </td>


            <td class="d-flex gap-2 justify-content-center">
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Update</a>
                <form action="{{ route('post.delete', $post->id) }}" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn btn-danger">Delete</button>

                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
@endsection
