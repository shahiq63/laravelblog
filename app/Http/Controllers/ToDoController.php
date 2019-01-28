<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use Auth;
use DB;
use App\User;
class ToDoController extends Controller
{
  public function index()
  {
    if(isset(Auth::user()->name)){
      $name = Auth::user()->name;
      if($name == 'admin'){
        $users = User::all();
        $tasks = Task::all();
        return view('admin.add_task',['users'=>$users,'tasks'=>$tasks]);
      }else {
        $tasks = DB::table('tasks')->where('username', $name)->get();
        return view('todo.index',['tasks'=>$tasks]);
      }
    }else {
      return view('todo.index');
    }
  }

  public function create(Request $request)
  {
     $this->validate($request,[
      'task' => 'required|unique:tasks,title',
     ]);
     $file = $request->file('photo');
     $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
     $path = $file->storeAs('photos', $filename);
     if ($request->input('task') && $request->file('photo') && isset(Auth::user()->name)) {
      $task = new Task;
      $task->title = $request->input('task');
      $task->description = $request->input('description');
      $task->Image_path = $path;
      $task->username = $request->get('username');
      $task->save();
      return redirect()->back();
    }else {
      return redirect()->back()->withErrors(['Please Login First']);
    }
  }
 
  public function update($id)
  {
    $task = Task::find($id);
    $users = User::all();
    return view('todo.update',['task'=>$task,'users'=>$users]);
  }

  public function updated($id , Request $request)
  {
    $task = Task::find($id);
    if($request->input('task')) {
      $task->title = $request->input('task');
      $task->description = $request->input('description');
      $task->username = $request->get('username');
      $task->save();
    }
    return redirect('/');
  }

  public function assign($id)
  {
   $task = Task::find($id);
   $users = User::all();
   return view('todo.assign',['task'=>$task,'users'=>$users]); 
  }
  
  public function delete($id)
  {
    $task = Task::find($id);
    $task->delete();
    return redirect()->back();
  }
}
