<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class PageController extends Controller
{
    public function index(){

        $projects = Project::with('type', 'technologies')->paginate(20);
        // $projects = Project::with('type', 'technologies')->get();

        return response()->json($projects);
    }

    public function getTypes(){
        $types = Type::all();

        return response()->json($types);
    }

    public function getTechnologies(){
        $technologies = Technology::all();

        return response()->json($technologies);
    }
}
