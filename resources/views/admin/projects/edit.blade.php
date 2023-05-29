@extends('layouts/admin')

@section('content')

    <div class="container py-5">
        <h2>Edit a Project</h2>

        <form action=" {{ route('admin.projects.update',  $project->slug) }} " method="POST">
            @csrf 
            @method('PUT')

            <div class="m-2">
                <label for="title">Title:</label>
                <input class="mx-3 form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title') ?? $project->title}}" required>

                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="m-2">
                <label for="description">Description:</label>
                <textarea class="mx-3 form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{old('description') ?? $project->description}}</textarea>

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="m-2">
                <label for="cover_image">Thumbnail:</label>
                <input class="mx-3 form-control @error('cover_image') is-invalid @enderror" type="file" id="cover_image" name="cover_image">

                @error('cover_image')
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
                        <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$type->title}}</option>
                    @endforeach

                </select>

                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- TECHS -->
            <div class="m-2 d-flex">
                Technologies:

                @foreach($technologies as $technology)
                    <div class="form-check">
                        <input type="checkbox" id="technology-{{$technology->id}}" name="technologiesArray[]" value="{{$technology->id}}">
                        <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
                    </div>
                @endforeach
            </div>

            

            <div class="m-2">
                <label for="repository">Repository:</label>
                <input class="mx-3 form-control @error('github_repo') is-invalid @enderror" type="text" id="repository" name="repository" value="{{old('repository') ?? $project->repository}}" required>

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

