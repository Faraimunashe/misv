<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('project'))
        {
            return redirect()->route('admin-projects');
        }elseif(Auth::user()->hasRole('finance'))
        {
            return redirect()->route('finance-dashboard');
        }
    }
}
