@extends('layouts/admin')

@section('content')

<div class="container p-5">

    <h3 class="m-5">
        Category: {{$type->title}}
    </h3>

    <hr class="m-2">

    <div class="m-5">
        <strong>Description: </strong>{{$type->description}}
    </div>

    <div class="m-5">
    
      <a class="btn btn-primary"href="{{route('admin.types.edit', $type)}}">EDIT</a>
    
  
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteType">
        DELETE
      </button>
    

      <div class="modal fade" id="deleteType" tabindex="-1" aria-labelledby="deleteTypeLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title fs-5" id="exampleModalLabel">DELETE CATEGORY</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure? You cannot reverse the action.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
              <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                @csrf
                @method('DELETE')
      
                <button type="submit" class="btn btn-danger">DELETE</button>
              </form>
            </div>
          </div>
        </div>
      </div>

  </div>


</div>
@endsection