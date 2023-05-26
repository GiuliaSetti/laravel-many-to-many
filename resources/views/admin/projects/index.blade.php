
@extends('layouts/admin')

@section('content')

    <div class="container p-2">

        <h2 class="m-3 text-center py-3">
            Take a look at all the projects!
        </h2>

        <table class="table table-hover">

            <thead>
                <th>Title</th>
                <th>Type</th>
                <th>Repository</th>
                <th>Details</th>
            </thead>

            <tbody>

              @foreach($projects as $project)
                <tr>
                    <td>{{$project->title}}</td>
                    <td>{{$project->type?->title}}</td>
                    <td>{{$project->repository}}</td>
                    
                    <td><a href="{{route('admin.projects.show', $project->slug)}}">Show More</a></td>
                </tr>
              @endforeach

            </tbody>

        </table>
        
        <div class="button d-flex justify-content-center">
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary">ADD A PROJECT</a>
        </div>

    </div>

@endsection