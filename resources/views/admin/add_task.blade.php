@extends('layouts.app')

@section('content')

<div id="myDIV" class="container">
  
  <h2>Assign Tasks</h2>
  <form method="POST" enctype="multipart/form-data" action="{{ route('create') }}">
    <div class="form-group">
      <input type="text" name ="task" id="myInput" placeholder="Title" class="form-control" required>
    </div>
    <div class="form-group">
      <textarea class="form-control" name="description" placeholder="Task Description"></textarea>
    </div>
    <select class="form-group form-control" name="username">
      @foreach($users as $user)
        <option class="form-control"value="{{$user->name}}">{{$user->name}}</option>
      @endforeach
    </select>
    <div class="form-group">
      <input type="file" name="photo" class="form-control-file" required>
    </div>
    <div class="form-group">
      <button type="Submit" class="btn btn-primary">Submit</button>
    </div>
    {{ csrf_field() }}
  
  </form>

</div>
 @if(isset($tasks))
 <div id="accordion" class="container">
  @foreach($tasks as $task)
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$task->id}}" aria-expanded="true" aria-controls="collapseOne">
          {{$task->title}}
        </button>
        <a href="{{route('update',['id'=>$task->id])}}">Edit</a>
      </h5>
    </div>
    <div id="collapse{{$task->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        {{$task->description}}
      </div>
    </div>
  </div>
  @endforeach
  </div>
  @endif
@endsection
