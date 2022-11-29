<?php

use App\Models\Allocate;
use App\Models\Project;
use App\Models\Resource;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function get_status($num){
    $status = new stdClass();
    if($num === 2){
        $status->label = "pending";
        $status->badge = "warning";
    }elseif($num === 1){
        $status->label = "approved";
        $status->badge = "success";
    }else{
        $status->label = "rejected";
        $status->badge = "danger";
    }

    return $status;
}

function get_project($project_id){
    return Project::find($project_id);
}

function get_resource($resource_id){
    return Resource::find($resource_id);
}

function critical_path($project_id)
{
    $project = Project::find($project_id);
    //$total = Allocate::where('project_id', $project_id)->count();
    $without_repeated = DB::table('allocates')
        ->select('resource_id', DB::raw('count(*) as total'))
        ->groupBy('resource_id')
        ->count();

    if($without_repeated < 4)
    {
        return null;
    }
    $date = Carbon::now();

    if($project->distance <= 0)
    {
        return null;
    }elseif($project->distance == 1 && $project->distance <= 10)
    {
        $date->addDays(14);
    }elseif($project->distance > 10 && $project->distance <= 20)
    {
        $date->addDays(21);
    }elseif($project->distance > 20 && $project->distance <= 30)
    {
        $date->addDays(28);
    }elseif($project->distance > 30 && $project->distance <= 40)
    {
        $date->addDays(35);
    }elseif($project->distance > 40 && $project->distance <= 50)
    {
        $date->addDays(40);
    }elseif($project->distance > 50 && $project->distance <= 70)
    {
        $date->addDays(37);
    }elseif($project->distance > 70 && $project->distance <= 100)
    {
        $date->addDays(40);
    }elseif($project->distance > 100 && $project->distance <= 150)
    {
        $date->addDays(60);
    }elseif($project->distance > 150 && $project->distance <= 200)
    {
        $date->addDays(80);
    }elseif($project->distance > 200)
    {
        $date->addDays(90);
    }

    return $date;
}
