@extends('layouts.admin')
@section('content')
    <section class="container">
        <h1>Category Create</h1>
        <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
     <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                required minlength="3" maxlength="200" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>

        </form>
    </section>
@endsection
