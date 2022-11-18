<?php

namespace App\Http\Controllers\finance;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $finances = Resource::latest()->paginate(10);
        return view('finances.dashboard', [
            'finances' => $finances
        ]);
    }
}
