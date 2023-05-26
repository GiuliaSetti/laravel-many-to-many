@extends('layouts/admin')

@section('content')

    <div class="container p-5">

        <h3 class="display-5 fw-bold mb-5">
            All technologies
        </h3>

        <table class="table table-hover">

            <thead class="text-white">
                <th>Name</th>
                <th>Color</th>
                <th>Details</th>
            </thead>

            <tbody>
                @foreach($technologies as $technology)
                    <tr>
                        <td>{{$technology->name}}</td>
                        <td><span class="badge rounded-pill mx-1" style="background-color: {{$technology->color}} ;">{{$technology->color}}</span></td>
                        <td><a href="{{route('admin.technologies.show', $technology->slug)}}">Show More</a></td>
                    </tr>
                @endforeach          
            </tbody>

        </table>

        <a class="btn btn-primary" href="{{route('admin.technologies.create')}}">ADD</a>
       

    </div>

@endsection