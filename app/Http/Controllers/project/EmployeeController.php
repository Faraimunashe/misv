<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Employees;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('projects.employees', [
            'employees' => Employees::latest()->paginate(10)
        ]);
    }

    public function employee(Request $request, $employee_id)
    {
        if($request->method() === "GET")
        {
            $employee = Employees::find($employee_id);
            return view('projects.employee', [
                'employee' => $employee
            ]);
        }/*
        elseif($request->method() === "POST")
        {

            $request->validate([
                'fullname' => ['required', 'string'],
                'gender' => ['required', 'string'],
                'dob' => ['required', 'date', 'before:2004-12-12'],
                'salary' => ['required', 'numeric'],
            ]);

            try{
                $emp = new Employees();
                $emp->fullname = $request->fullname;
                $emp->gender = $request->gender;
                $emp->salary = $request->salary;
                $emp->dob = $request->dob;
                $emp->ecno = 'EC-'.rand(11111111,88888888);
                $emp->save();

                return redirect()->back()->with('success', 'successfully added an employee');
            }catch(Exception $e)
            {
                return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
            }

        }
        */
    }

    public function add_employee(Request $request)
    {
        if($request->method() === "GET")
        {
            return view('projects.create-employee');
        }elseif($request->method() === "POST")
        {

            $request->validate([
                'fullname' => ['required', 'string'],
                'gender' => ['required', 'string'],
                'dob' => ['required', 'date', 'before:2004-12-12'],
                'salary' => ['required', 'numeric'],
            ]);

            try{
                $emp = new Employees();
                $emp->fullname = $request->fullname;
                $emp->gender = $request->gender;
                $emp->salary = $request->salary;
                $emp->dob = $request->dob;
                $emp->ecno = 'EC-'.rand(11111111,88888888);
                $emp->save();

                return redirect()->back()->with('success', 'successfully added an employee');
            }catch(Exception $e)
            {
                return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
            }

        }
    }

    public function comment(Request $request, $employee_id)
    {
        if($request->method() === "GET")
        {
            $employee = Employees::find($employee_id);
            return view('projects.comment', [
                'employee' => $employee
            ]);
        }elseif($request->method() === "POST")
        {

            $request->validate([
                'project_id' => ['required', 'integer'],
                'employee_id' => ['required', 'integer'],
                'comment' => ['required', 'string']
            ]);

            try{
                $com = new Comment();
                $com->project_id = $request->project_id;
                $com->employee_id = $request->employee_id;
                $com->comment = $request->comment;
                $com->save();

                return redirect()->back()->with('success', 'successfully added a comment');
            }catch(Exception $e)
            {
                return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
            }

        }
    }
}
