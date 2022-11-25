<?php

namespace App\Http\Controllers\finance;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense = Resource::latest()->get();
        return view('finances.expense', [
            'expenses' => $expense
        ]);
    }
}
