@extends('layouts/admin')

@section('content')

    <div class="container p-5">

        <h3 class="display-5 fw-bold mb-5">
            Add a new technology
        </h3>

        <form action=" {{ route('admin.technologies.store') }} " method="POST">
            @csrf 

            <div class="m-2">
                <label for="name">Name:</label>
                <input class="mx-3 form-control" type="text" id="name" name="name" value="{{old('name')}}" required>
            </div>

            <div class="m-2" style="width:200px">
                <label for="color">Color:</label>
                <input class="mx-3 form-control" type="color" id="color" name="color" value="{{old('color')}}" required>
            </div>

            <button class="btn btn-primary m-4" type="submit">ADD</button>
        </form>

       
    </div>

@endsection