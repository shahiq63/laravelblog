@extends('layouts.app')

@section('content')

<div id="myDIV" class="container">
  
  <h2 style="margin:5px">Assign Task to Others</h2>
  <form method="POST" enctype="multipart/form-data" action="{{ route('updated',['id'=>$task->id]) }}">
    <div class="form-group">
      <input type="text" class="form-control" name ="task" id="myInput" placeholder="Title..." value="{{$task->title}}" readonly>
    </div>
    
    <div class="form-group">
      <textarea class="form-control" name="description" placeholder="Task Description" readonly>{{$task->description}}
      </textarea >
    </div>
    
    <select class="form-group form-control" name="username">
      <option class="form-control"value="{{$task->username}}" selected="selected">{{$task->username}}</option>
      @foreach($users as $user)
        <option class="form-control"value="{{$user->name}}">{{$user->name}}</option>
      @endforeach
    </select>

    <div class="form-group">
      <input type="submit" value="Update" class="btn btn-primary">
    </div>

    {{ csrf_field() }}
  
  </form>

</div>
@endsection
