<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index(){

        $count_projects = Project::count();

        $last_project = Project::orderByDesc('id')->first();

        return view('admin.home', compact('count_projects', 'last_project'));
    }
}
