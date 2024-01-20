@extends('layouts.admin')
@section('content')
    <section class="container">
        <h1>technology List</h1>
       <div class="text-end">
        <a class="btn btn-success" href="{{route('admin.technologies.create')}}">Crea nuovo technology</a>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($technologies as $technology)
                <tr>
                    <th scope="row">{{$technology->id}}</th>
                    <td><a href="{{route('admin.technologies.show', $technology->slug)}}" title="View technology">{{$technology->name}}</a></td>

                    <td><a class="link-secondary" href="{{route('admin.technologies.edit', $technology->slug)}}" title="Edit technology"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$technology->name}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    </section>
     @include('partials.modal-delete')
@endsection
