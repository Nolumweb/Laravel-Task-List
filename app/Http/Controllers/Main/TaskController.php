<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   
    public function index(){
       $data=Task::latest()->paginate(5);
        return view('task.index' , compact('data'));
    }

  
    public function create(){
        return view('task.create');
    }

    public function add(){
        return view('add');
    }

    public function addd(){
        return view('task.add');
    }
    
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required'
        ]);
    
        $task = new Task;
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();
    
        return redirect()->route('task.index')->with('Successfull');

    }



public function show($id){
    $task = Task::findOrFail($id);
    return view('task.show', compact('task'));
}
    
public function edit($id){
    $task = Task::findOrFail($id);
    return view('task.edit', compact('task'));
}

public function update(Request $request, $id){
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('task.index')->with('success', 'Task updated successfully.');
}


    
public function updateStatus(Request $request, $id){

    $task = Task::findOrFail($id);
    $task->completed = !$task->completed;
    $task->save();
    return redirect()->route('task.show', ['id' => $id])->with('success', 'Task status updated successfully.');
}
    
  
public function destroy($id){
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
}
    
    

  
}
