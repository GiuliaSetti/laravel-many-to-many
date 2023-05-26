@extends('layouts/admin')

@section('content')

    <div class="container p-5">

        <h3 class="display-5 fw-bold mb-5">
            Technology: {{$technology->name}}
        </h3>

        @if(count($technology->projects) > 0)

        <table class="table table-hover">

            <thead class="text-white">
                <th>Title</th>
                <th>Type</th>
                <th>Repository</th>
                <th>Details</th>
            </thead>

            <tbody>
                @foreach($technology->projects as $project)
                    <tr>
                        <td>{{$project->title}}</td>
                        <td>{{$project->type?->title}}</td>
                        <td>{{$project->repository}}</td>
                        <td>
                        <a href="{{route('admin.projects.show', $project->slug)}}">Show More</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        @else  

        <div>There are no projects with this technology</div>

            <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">
                ADD
            </a>

        @endif


        <a class="btn btn-primary" href="{{route('admin.technologies.edit', $technology->slug)}}">EDIT</a>
        <button type="button" class="btn bg-danger text-white" data-bs-toggle="modal" data-bs-target="#deleteProject">
            DELETE
        </button>

        <div class="modal" id="deleteProject" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Technology</h1>
                    </div>

                    <div class="modal-body">
                        Are you sure? You cannot reverse the action.
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>

                        <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form>

                    </div>

                </div>
            </div>
        </div> 

    </div>

@endsection