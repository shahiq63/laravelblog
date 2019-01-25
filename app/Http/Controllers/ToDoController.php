<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use Auth;
use DB;
class ToDoController extends Controller
{
  public function index()
  {
    // $tasks = Task::all();
    if(isset(Auth::user()->name)){
      $name = Auth::user()->name;
      $tasks = DB::table('tasks')->where('username', $name)->get();
      return view('todo.index',['tasks'=>$tasks]);
    }else {
      return view('todo.index');
    }
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
     if ($request->input('task') && $request->file('photo') && isset(Auth::user()->name)) {
      $task = new Task;
      $task->content = $request->input('task');
      $task->Image_path = $path;
      $task->username = Auth::user()->name;
      $task->save();
      return redirect()->back();
    }else {
      return redirect()->back()->withErrors(['Please Login First']);
    }
  }
 
  public function update($id)
  {
    $task = Task::find($id);
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
  }

  public function delete($id)
  {
    $task = Task::find($id);
    $task->delete();
    return redirect()->back();
  }
}
