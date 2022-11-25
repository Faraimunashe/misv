<?php

use App\Models\Project;
use App\Models\Resource;

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
