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
    // $file = $request->file('photo');

    // // generate a new filename. getClientOriginalExtension() for the file extension
    // $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();

    // // save to storage/app/photos as the new $filename
    // $path = $file->storeAs('photos', $filename);
    // var_dump($path);

    if ($request->input('task')) {
      $task = new Task;
      $task->content = $request->input('task');
      $task->save();
    }
    return redirect()->back();
  }

  public function update($id)
  {
    $task = Task::find($id);
     $task->toggleStatus();
     $task->save();
     return redirect()->back();
  }

  public function delete($id)
  {
    $task = Task::find($id);
    $task->delete();
    return redirect()->back();
  }
}
