@extends('layouts/admin')

@section('content')

    <div class="container p-5">

        <h3 class="display-5 fw-bold mb-5">
            Edit a Technology
        </h3>

        <form action=" {{ route('admin.technologies.update', $technology->slug) }} " method="POST">
            @csrf 
            @method('PUT')

            <div class="m-2">
                <label for="name">Name:</label>
                <input class="mx-3 form-control" type="text" id="name" name="name" value="{{old('name') ?? $technology->name}}" required>
            </div>

            <div class="m-2" style="width:150px">
                <label for="color">Color:</label>
                <input class="mx-3 form-control" type="color" id="color" name="color" value="{{old('color') ?? $technology->color}}" required>
            </div>

            <button class="btn btn-primary m-4" type="submit">EDIT</button>
        </form>


    </div>

@endsection