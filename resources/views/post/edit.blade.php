@extends('layout.main')
@section('content')
    <div class="">
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $post->title ?? '') }}" placeholder="Title">
                @error('title')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="content">Content</label>
                <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" id="content" value="{{ old('content', $post->content ?? '') }}"  placeholder="Content">
                @error('content')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="text" name="image" class="form-control" id="image" value="{{ $post->image ? $post->image : "" }}" placeholder="Image">
            </div>
            <select class="w-100 mb-2 custom_selects" name="category_id">
                @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                            @if(old('category_id', $post->category_id) == $category->id) selected @endif>
                        {{ $category->title }}
                    </option>


                    {{--                    <option--}}
{{--                            {{ old('category_id') == $category->id ? 'selected' : '' }}--}}
{{--                            value="{{ $category->id }}">{{ $category->title }}</option>--}}


                @endforeach
            </select>

            <div class="mb-2">
                <label for="tags">Tags</label>
                <select class="form-select" multiple aria-label="Tags" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' :  ''}}
{{--                            @foreach($Post->tags as $postTag)--}}
{{--                                {{ $tag->id === $postTag->id ? ' selected' : '' }}--}}
{{--                            @endforeach--}}{{-- FOREACH BILAN HAM QILSA BO'LADI--}}
                            value="{{ $tag->id }}">
                            {{ $tag->title }}
                        </option>
{{--                        <option class="custom_class" value="{{ $tag->id }}">{{ $tag->title }}</option>--}}
                    @endforeach


                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script>
        let firstErrorInput = document.querySelector(".error-message");
        if (firstErrorInput) {
            let inputField = firstErrorInput.closest("div").querySelector("input, textarea");
            if (inputField) {
                inputField.focus();
            }
        }
    </script>
@endsection
