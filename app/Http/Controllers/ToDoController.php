<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class ToDoController extends Controller
{
  public function index()
  {
    $tasks = Task::all();
    return view('todo.index',['tasks'=>$tasks]);

  }

  public function create(Request $request)
  {
     $this->validate($request,[
      'task' => 'required|unique:tasks,content',
      'photo'=> 'required'
     ]);
     $file = $request->file('photo');
     $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
     $path = $file->storeAs('photos', $filename);
     if ($request->input('task') && $request->file('photo')) {
      $task = new Task;
      $task->content = $request->input('task');
      $task->Image_path = $path;
      $task->save();
    }
    return redirect()->back();
  }

  public function update($id)
  {
    $task = Task::find($id);
     // $task->toggleStatus();
     // $task->save();
     //return redirect()->back();
     return view('todo.update',['task'=>$task]);
  }

  public function updated($id , Request $request)
  {
    $task = Task::find($id);
    if($request->input('task')) {
      $task->content = $request->input('task');
      $task->save();
    }

    return redirect('/');
    // $tasks = Task::all();
    // return view('todo.index',['tasks'=>$tasks]);

  }

  public function delete($id)
  {
    $task = Task::find($id);
    $task->delete();
    return redirect()->back();
  }
}
