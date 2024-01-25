@extends('layouts.admin')
@section('content')
<div class="my-bg">
    <section class="container my-mt text-light py-5">
    <h1 class="pt-5">{{$category->name}}</h1>
    <h3>Post List</h3>
    <ul class="list-group list-group-flush">
        @forelse ($category->posts as $post)
        @if (Auth::id() == $post->user_id || Auth::id() == 1)
            <li class="list-group-item">
                <a href="{{route('admin.posts.show', $post->slug)}}" class="link-underline link-underline-opacity-0"> {{$post->title}}</a>
            </li>
            @endif
        @empty
            <li>No posts</li>
        @endforelse
    </ul>
</section>
</div>

@endsection
