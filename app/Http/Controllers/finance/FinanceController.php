<?php

namespace App\Http\Controllers\finance;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Exception;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function create_resource()
    {
        return view('finances.create-resource');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'qty' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
        ]);

        try{
            $resource = new Resource();
            $resource->name = $request->name;
            $resource->qty = $request->qty;
            $resource->price = $request->price;
            $resource->save();

            return redirect()->back()->with('success', 'successfully added a resources');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
