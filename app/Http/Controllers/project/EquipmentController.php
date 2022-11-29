<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::latest()->get();
        return view('projects.equipment', [
            'equipments' => $equipments
        ]);
    }

    public function new()
    {
        return view('projects.create-equipment');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'model' => ['required', 'string'],
            'value' => ['required', 'numeric'],
            'lifespan' => ['required', 'numeric'],
            'performance' => ['required', 'string'],
            'maintenance' => ['required', 'string']
        ]);

        try{
            $eq = new Equipment();
            $eq->name = $request->name;
            $eq->model = $request->model;
            $eq->value = $request->value;
            $eq->lifespan = $request->lifespan;
            $eq->performance = $request->performance;
            $eq->maintenance = $request->maintenance;
            $eq->save();

            return redirect()->back()->with('success', 'successfully added equipment');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
