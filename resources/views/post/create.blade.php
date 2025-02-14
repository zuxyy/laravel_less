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
                <input type="text" value="{{ old('title') }}" name="title"
                       class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title">
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

            <div class="mb-2">
                <label for="category_id w-100">Categories</label>
                <select class="w-100 mb-2 custom_selects" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option class="custom_class" value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label for="tags">Tags</label>
                <select class="form-select" multiple aria-label="Tags" id="tags">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            @error('content')
            <p class="error-message">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

