@extends('layout.main')
@section('content')
    <div class="">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" value="{{ old('title') }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="content">Content</label>
                <input type="text" name="content" class="form-control" id="content" placeholder="Content">
                @error('content')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image">
            </div>

            <div class="form-group mb-2">
                <label for="content">Content</label>
                <input type="text" name="content" class="form-control" id="content" placeholder="Content">
                @error('content')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
