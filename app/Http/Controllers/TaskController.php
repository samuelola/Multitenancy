<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
   public function addTask(){
        $allprojects = Project::orderByDesc("id")->get();
        return view('addtask',compact('allprojects'));
   }

   public function storeTask(TaskRequest $request){
        $data = $request->validated();
        Task::create($data);        
        return redirect()->route('dashboard');
   }

   public function edit_task($id){
        $get_task = Task::where('id',$id)->first();
        return view('edit_task',compact('get_task'));
   }

   public function delete_task($id){
       
          $get_task = task::where('id',$id)->first(); 
          $get_task->delete();
          return redirect()->route('dashboard');
   }
}
