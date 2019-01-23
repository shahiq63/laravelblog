@extends('layouts.app')

@section('content')

<div id="myDIV" class="header">
  
  <h2 style="margin:5px">Update Task</h2>
  <form method="POST" enctype="multipart/form-data" action="{{ route('updated',['id'=>$task->id]) }}">
    <input type="text" name ="task" id="myInput" placeholder="Title..." value="{{$task->content}}">
    <input type="submit" value="Add" class="addBtn">

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
