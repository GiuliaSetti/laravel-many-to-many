@extends('layouts/admin')

@section('content')


<div class="container my-3 text-center">
    <h1 class="my-3">
        Project Overview
    </h1>
    <h2>{{$project->title}}</h2>
    <hr class="py-2">

    <div class="project_desc">
        <p>{{$project->description}}</p>
    </div>

    <div class="project_slug">
        <pre>
            ({{$project->slug}})
        </pre>
    </div>

    <div class="project_type">
        <div>Type: {{$project->type->title ?? 'Unknown'}}</div>
    </div>

    <div class="project_tech">

        <span class="me-2">Technologies: </span>

        @foreach($project->technologies as $technology)
        <span class="badge rounded-pill mx-1" style="background-color: {{$technology->color}};">{{$technology->name}}</span>
        @endforeach

    </div>

    <div class="button my-2">
        <a class="btn btn-primary" href="{{route('admin.projects.edit', $project->slug)}}">EDIT</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProject">
            DELETE PROJECT
        </button>
    </div>

    

    <div class="modal" id="deleteProject" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete Project</h4>
                </div>

                <div class="modal-body">
                   Are you sure? You cannot reverse the action.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>

                    <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" type="submit">DELETE</button>
                    </form>

                </div>

            </div>
        </div>
    </div> 

    <div class="m-5">
        <a href="{{route('admin.projects.index')}}">Go back to the projects page</a>
    </div>
</div>


@endsection