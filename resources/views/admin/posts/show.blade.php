@extends('layouts.admin')
@section('content')
<div class=" my-bg">
    <section class="container my-mt" id="item-post">
        <div class="d-flex justify-content-end align-items-center py-5">

             <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-success px-3 mt-5">Edit</a>
        </div>
        <div class="row">
            <div class="col-6 px-5">
                @if (!$post->name)
                <img src="{{Vite::asset('storage/app/images/' . $post->title.'.png')}}" alt="{{$post->title}}" class=" w-100">
                @else
                <img src="{{Vite::asset('storage/app/' . $post->image)}}" alt="{{$post->title}}">
                @endif
            </div>
            <div class="col p-5 text-light">
                 <h1>{{$post->title}}</h1>
            <p>{!! $post->body !!}</p>
            @if($post->category_id)
                <div class="mb-3">
                    <h4>Category</h4>
                    <a class="badge text-bg-primary" href="{{route('admin.categories.show', $post->category->slug)}}">{{$post->category->name}}</a>
                </div>
            @endif

             @if(count($post->technologies) > 0)
                <div class="mb-3">
                    <h4>technologies</h4>
                    @foreach ($post->technologies as $technology)
                        <a class="badge rounded-pill text-bg-success" href="{{route('admin.technologies.show', $technology->slug)}}">{{$technology->name}}</a>
                    @endforeach

                </div>
            @endif
            </div>

        </div>
    </section>
</div>


@endsection
