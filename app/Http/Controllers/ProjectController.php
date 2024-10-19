<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{

    public function addProject(Request $request){
        return view('addproject');
    }
    public function storeProject(ProjectRequest $request){
        $data = $request->validated();
        Project::create($data);        
        return redirect()->route('dashboard');
    }
    public function edit_project(Request $request,$id){
         $get_project = Project::where('id',$id)->first();
         return view('edit_project',compact('get_project'));
    }

    public function update_project(ProjectRequest $request,$id){
         $get_project = Project::where('id',$id)->first();
         $data = $request->validated(); 
         $get_project->update($data);
         return redirect()->route('dashboard');
    }

    public function delete_project($id){
         $get_project = Project::where('id',$id)->first(); 
         $get_project->task()->delete();
         //this is used for many to many relationships
        //  $get_project->tasks->each->delete(); 
         $get_project->delete();
         return redirect()->route('dashboard');
    }
}
