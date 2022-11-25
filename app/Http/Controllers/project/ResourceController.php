<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\Allocate;
use App\Models\Project;
use App\Models\Resource;
use Exception;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index($project_id)
    {
        $resources = Resource::all();
        return view('projects.add-resource',[
            'project' => Project::find($project_id),
            'resources' => $resources
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'project_id' => ['required', 'integer'],
            'resource_id' => ['required', 'integer'],
            'qty' => ['required', 'integer']
        ]);

        try{
            $res = new Allocate();
            $res->project_id = $request->project_id;
            $res->resource_id = $request->resource_id;
            $res->qty = $request->qty;
            $res->save();

            return redirect()->back()->with('success', 'Successfully added resource to project');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
