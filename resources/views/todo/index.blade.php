@extends('todo.layout')

@section('layout_content')

<div id="myDIV" class="header">
  
  <h2 style="margin:5px">My To Do List</h2>
  <form method="POST" action="{{ route('create') }}">
    <input type="text" id="myInput" placeholder="Title...">
    <input type="submit" value="Add" class="addBtn">
  </form>

</div>

<ul id="myUL">
  <li>Hit the gym</li>
  <li class="checked">Pay bills</li>
  <li>Meet George</li>
  <li>Buy eggs</li>
  <li>Read a book</li>
  <li>Organize office</li>
</ul>

@endsection
