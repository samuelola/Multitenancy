<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Task;
use App\Models\Invitation;

class DashboardController extends Controller
{
    public function dashboard(){
        $allprojects = Project::orderByDesc("id")->get();
        $alltasks = Task::orderByDesc("id")->get();
        $invitations = Invitation::where('tenant_id',auth()->user()->current_tenant_id)->latest()->get();
        return view('dashboard',compact('allprojects','alltasks','invitations'));
    }
}
