@extends('layouts.admin')
@section('content')
<div id="posts">
    <section class="container my-mt py-5">
        <h1 class="pt-5">Post List</h1>
       <div class="text-end">
        <a class="btn my-btn-light second-color border-0  my-3" href="{{route('admin.posts.create')}}">Crea nuovo post</a>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif
    <table class="table table-striped  ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td><a href="{{route('admin.posts.show', $post->slug)}}" title="View Post">{{$post->title}}</a></td>
                    <td>{{Str::limit($post->body,100)}}</td>

                    <td><a class="link-secondary" href="{{route('admin.posts.edit', $post->slug)}}" title="Edit Post"><i class="fa-solid fa-pen text-light "></i></a></td>
                    <td>
                        <form action="{{route('admin.posts.destroy', $post->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$post->title}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    {{$posts->links('vendor.pagination.bootstrap-5')}}
    </section>
</div>
     @include('partials.modal-delete')

@endsection
