@extends('layouts.app')

@section('content')

<div id="myDIV" class="container">
  
  <h2 style="margin:5px">Update Task</h2>
  <form method="POST" enctype="multipart/form-data" action="{{ route('updated',['id'=>$task->id]) }}">
    <div class="form-group">
      <input type="text" class="form-control" name ="task" id="myInput" placeholder="Title..." value="{{$task->content}}">
    </div>

    <div class="form-group">
    <input type="submit" value="Update" class="btn btn-primary">
      
    </div>

    {{ csrf_field() }}
  
  </form>

</div>

 @if(count($errors)>0)

    <ul>
      @foreach($errors->all() as $error)

      <li class="alert"> {{$error}}</li>
      @endforeach
    </ul>

 @endif


@endsection
