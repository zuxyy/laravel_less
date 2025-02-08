@extends('layout.main')
@section('content')
    <div class="">
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group mb-2">
                <label for="content">Content</label>
                <input type="text" name="content" class="form-control" id="content" placeholder="Content">
            </div>
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
