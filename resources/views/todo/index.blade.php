@extends('layouts.app')

@section('content')

<div id="myDIV" class="header">
  
  <h2 style="margin:5px">My To Do List</h2>
  <form method="POST" enctype="multipart/form-data" action="{{ route('create') }}">
    <input type="text" name ="task" id="myInput" placeholder="Title...">
    <input type="file" name="photo">
    <input type="submit" value="Add" class="addBtn">

    {{ csrf_field() }}
  
  </form>

</div>

<ul id="myUL" class="list-group list_group">

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

   
  </ul>

@endsection
