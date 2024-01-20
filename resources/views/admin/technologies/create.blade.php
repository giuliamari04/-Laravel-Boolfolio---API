@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Create new Technology</h1>
        <form action="{{route('admin.technologies.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    required maxlength="200" minlength="3" value="{{old('name')}}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-secondary ">Reset</button>

        </form>
    </section>
@endsection
