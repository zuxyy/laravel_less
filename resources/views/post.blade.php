@extends('layout.main')
@section('content')

        <table class="table table-bordered table-primary table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Likes</th>
                <th>Created date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $id => $post)
                <tr>
                    <td>
                        {{ $id + 1 }}
                    </td>

                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->image }}
                    </td>
                    <td>
                        {{ $post->likes }}
                    </td>
                    <td>
                        {{ $post->created_at }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
