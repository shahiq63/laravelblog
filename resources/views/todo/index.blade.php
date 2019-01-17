@extends('todo.layout')

@section('layout_content')

<div id="myDIV" class="header">
  
  <h2 style="margin:5px">My To Do List</h2>
  <form method="POST" action="{{ route('create') }}">
    <input type="text" name ="task" id="myInput" placeholder="Title...">
    <input type="submit" value="Add" class="addBtn">

    {{ csrf_field() }}
  
  </form>

</div>

<ul id="myUL">

  <?php foreach($tasks as $task):?>

    <?php if($task->status == 0):?>
    
    <li onclick="location.href='{{ route('update',['id'=>$task->id]) }}'" class="checked">
      <?php echo $task->content;?>
      <a href="{{ route('delete',['id'=>$task->id]) }}" class="close">x</a>
    </li>

    <?php endif;?>

    <?php if($task->status == 1):?>
    
    <li onclick="location.href='{{ route('update',['id'=>$task->id]) }}'">
     <?php echo $task->content; ?> 
     <a href="{{ route('delete',['id'=>$task->id]) }}"class="close">x</a>
   </li>

    <?php endif;?>
  
  <?php endforeach ?>

   
  </ul>

@endsection
