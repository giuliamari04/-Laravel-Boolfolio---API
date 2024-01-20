@extends('layouts.admin')
@section('content')
<section class="container">
    <h1>{{$technology->name}}</h1>
    <h3>Post List</h3>
    <ul class="list-group list-group-flush">

        @forelse ($technology->posts as $post)
            <li class="list-group-item">
                <a href="{{route('admin.posts.show', $post->slug)}}" class="link-underline link-underline-opacity-0"> {{$post->title}}</a>
            </li>
        @empty
            <li>No posts</li>
        @endforelse
    </ul>
</section>
@endsection
