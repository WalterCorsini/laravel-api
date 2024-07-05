<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        //  don't work
        $latestProjects = Project::recent()->get();
        dd($latestProjects);
        return view('admin.dashboard',compact('latestProjects'));
        // don't work
    }
}
