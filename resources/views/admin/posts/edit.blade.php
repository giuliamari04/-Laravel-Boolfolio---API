@extends('layouts.admin')
@section('content')
    <section class="container my-mt py-5 my-bg text-light ">
        <h1>Edit {{$post->title}}</h1>
        <form action="{{ route('admin.posts.update', $post->slug) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
     <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                required minlength="3" maxlength="200" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
<div class="mb-3">
            <label for="category_id">Select Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) ==  $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
    <div class="mb-3">
        <label for="body">Body</label>
        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10">{{ old('body', $post->body) }}
        </textarea>
        @error('body')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
    <div class="form-group">
        <h6>Select technologies</h6>
        @foreach ($technologies as $technology)
            <div class="form-check @error('technologies') is-invalid @enderror">
                @if($errors->any())
                 <input type="checkbox" class="form-check-input" name="technologies[]" value="{{ $technology->id }}"  {{ in_array($technology->id, old('technologies', $post->technologies)) ? 'checked' : '' }}>
                @else
                <input type="checkbox" class="form-check-input" name="technologies[]" value="{{ $technology->id }}"  {{ $post->technologies->contains($technology->id) ? 'checked' : '' }} >
                 @endif
                <label class="form-check-label">

                {{ $technology->name }}
                 </label>
            </div>
        @endforeach
        @error('technologies')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="d-flex">
        <div class="media me-4">
            <img class="shadow" width="150" src="{{Vite::asset('storage/app/images/' . $post->title.'.png')}}" alt="{{$post->title}}">
        </div>
        <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{old('image', $post->image)}}">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
        </div>
    </div>
     <div class="mt-3">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>

        </form>
    </section>
@endsection
