@extends('layouts/admin')

@section('content')
<div class="container m-5">
    <h3>Add a Category</h3>
<div class="p-5">
  <form action="{{route('admin.types.store')}}" method="POST">
    @csrf
  
    <div class="m-2">
      <label for="title">Title:</label>
      <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title')}}">

      @error('title')
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
      <button class="btn btn-primary" type="submit">ADD</button>
    </div>
  </form>

</div>

</div>

@endsection