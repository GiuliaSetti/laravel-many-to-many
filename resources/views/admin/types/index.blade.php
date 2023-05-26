@extends('layouts/admin')

@section('content')

    <div class="container p-5">

        <h3 class="mb-5">
            Categories
        </h3>

        <table class="table table-hover">

            <thead class="text-white">
                <th>Title</th>
                <th>Description</th>
                <th>Details</th>
            </thead>

            <tbody>

              @foreach($types as $type)
              <tr>
                <td>{{$type->title}}</td>
                <td>{{$type->description}}</td>
                <td><a href="{{ route('admin.types.show', $type->slug) }}">Show</a></td>
              </tr>
              @endforeach

            </tbody>

        </table>

        <div>
            <a class="btn btn-primary" href="{{route('admin.types.create')}}">ADD</a>
        </div>

    </div>

@endsection