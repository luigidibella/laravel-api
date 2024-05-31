<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class PageController extends Controller
{
    public function index(){

        $project = Project::with('type', 'technologies')->paginate(25);

        return response()->json($project);
    }
}
