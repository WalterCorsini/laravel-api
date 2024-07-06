<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {

$user = Auth::user();
        //  don't work
        $latestProjects = Project::recent()->get();
        return view('admin.dashboard',compact('user'));
        // don't work
    }
}
