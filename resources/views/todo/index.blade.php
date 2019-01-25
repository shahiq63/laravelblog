@extends('layouts.app')

@section('content')

<div id="myDIV" class="container">
  
  <h2 style="margin:5px">My To Do List</h2>
  <form method="POST" enctype="multipart/form-data" action="{{ route('create') }}">
    <div class="form-group">
      <input type="text" name ="task" id="myInput" placeholder="Title" class="form-control">
    </div>
    <div class="form-group">
      <input type="file" name="photo" class="form-control-file">
    </div>
    <div class="form-group">
    <button type="Submit" class="btn btn-primary">Submit</button>
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

<ul id="myUL" class="list-group list_group">
  @if(isset($tasks))
  <?php foreach($tasks as $task):?>

    <?php if($task->status == 0):?>
    
    <li class="list-group-item list_item checked" onclick="location.href='{{ route('update',['id'=>$task->id]) }}'">
      <?php echo $task->content;?>
      <a href="{{ route('delete',['id'=>$task->id]) }}" class="close">x</a>
    </li>

    <?php endif;?>

    <?php if($task->status == 1):?>
    
    <li  class="list-group-item list_item" onclick="location.href='{{ route('update',['id'=>$task->id]) }}'">
     <?php echo $task->content; ?> 
     <a href="{{ route('delete',['id'=>$task->id]) }}"class="close">x</a>
   </li>

    <?php endif;?>

  <?php endforeach ?>
  @endif
  </ul>

@endsection
