<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
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

    public function create_project()
    {
        return view('projects.create-project');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            //'status' => ['required', 'integer'],
            'distance' => ['required', 'numeric'],
            'started_at' => ['required', 'date', 'after:yesterday'],
            'end_at' => ['require', 'date', 'after:started_at']
        ]);

        try{
            $project = new Project();
            $project->name = $request->name;
            $project->description = $request->description;
            $project->status = 2;
            $project->distance = $request->distance;
            $project->started_at = $request->started_at;
            $project->end_at = $request->end_at;
            $project->save();

            return redirect()->back()->with('success', 'successfully added project');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
