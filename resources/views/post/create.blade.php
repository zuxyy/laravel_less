@extends('layout.main')
@section('content')
    <div class="">

        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" value="{{ old('title') }}" name="title"
                       class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title">
                @error('title')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label for="content">Content</label>
                <input type="text" name="content" class="form-control" id="content" placeholder="Content">
                @error('content')
                <p class="error-message alert alert-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image">
            </div>

            <div class="mb-2">
                <label for="category_id w-100">Categories</label>
                <select class="w-100 mb-2 custom_selects" name="category_id" id="category_id">
                    <option value="" disabled selected>Select category</option>
                    @foreach($categories as $category)
                        <option class="custom_class"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <div class="error-message mb-2">{{ $message }}</div>
            @enderror

            <div class="mb-2">
                <label for="tags">Tags</label>
                <select class="form-select" multiple aria-label="Tags" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option class="custom_class" value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach


                </select>
            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

