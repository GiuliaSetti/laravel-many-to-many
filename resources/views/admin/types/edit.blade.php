@extends('layouts/admin')

@section('content')
<div class="container m-5">
    <h3>Edit Category</h3>
<div class="p-5">
  <form action="{{route('admin.types.update', $type)}}" method="POST">
    @csrf
  
    <div class="m-2">
      <label for="name">Title:</label>
      <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name')}}">

      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div class="m-2">
      <label for="description">Description:</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
      @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div>
      <button class="btn btn-primary" type="submit">EDIT</button>
    </div>
  </form>

</div>

</div>

@endsection