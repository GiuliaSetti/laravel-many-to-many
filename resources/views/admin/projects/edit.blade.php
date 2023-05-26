@extends('layouts/admin')

@section('content')

    <div class="container py-5">
        <h2>Edit a Project</h2>

        <form action=" {{ route('admin.projects.update',  $project->slug) }} " method="POST">
            @csrf 
            @method('PUT')

            <div class="m-2">
                <label for="title">Title:</label>
                <input class="mx-3 form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title')}}" required>

                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="m-2">
                <label for="description">Description:</label>
                <textarea class="mx-3 form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{old('description')}}</textarea>

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="m-2">
                <label for="thumb">Thumbnail:</label>
                <input class="mx-3 form-control @error('thumb') is-invalid @enderror" type="text" id="thumb" name="thumb" value="{{old('thumb')}}" required>

                @error('thumb')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="m-2">
                <label for="languages">Languages</label>
                <input class="mx-3 form-control @error('languages') is-invalid @enderror" type="text" id="languages" name="languages" value="{{old('languages')}}" required>

                @error('languages')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="m-2">
                <label for="type_id">Category:</label>
                <select name="type_id" id="type_id" class="mx-3 form-select @error('type_id') is-invalid @enderror">

                    <option value="" disabled selected>What is the category of the project?</option>
                    <option value="">None</option>

                    @foreach($types as $type) 
                        <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->title}}</option>
                    @endforeach

                </select>

                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="m-2">
                <label for="repository">Repository:</label>
                <input class="mx-3 form-control @error('github_repo') is-invalid @enderror" type="text" id="repository" name="repository" value="{{old('github_repo')}}" required>

                @error('repository')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

              <button type="submit" class="btn btn-primary">EDIT</button>
          </form>


    </div>

@endsection

