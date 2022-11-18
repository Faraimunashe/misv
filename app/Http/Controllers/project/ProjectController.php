<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginat(10);

        return view('projects.projects', [
            'projects' => $projects
        ]);
    }
}
