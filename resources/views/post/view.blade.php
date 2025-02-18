@extends('layout.main')
@section('content')
    <div class="">

        <table class="table table-bordered w-50 table-primary table-hover text-center">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->category->title }}</td>
{{--                  td  <td>--}}
{{--                        @foreach($categories as $category)--}}

{{--                            {{$category->title}}--}}
{{--                        @endforeach--}}
{{--                    </td>--}}
                    <td class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('Post.edit', $post->id) }}" class="btn btn-primary">Update</a>
                        <form action="{{ route('Post.delete', $post->id) }}" method="post">
                            @csrf
                            @method("delete")
                            <button class="btn btn-danger">Delete</button>

                        </form>
                        <a href="{{ route('Post.index') }}" class="btn btn-success">Back</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

@endsection
