<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Department;
use App\Employee;
use App\Empunion;
use App\Qualification;
use App\Rank;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranks = Rank::orderBy('created_at', 'asc')->get();
        $banks = Bank::orderBy('created_at', 'asc')->get();
        $departments = Department::orderBy('created_at', 'asc')->get();
        $empunions = Empunion::orderBy('created_at', 'asc')->get();
        $qualifications = Qualification::orderBy('created_at', 'asc')->get();
        $employees = Employee::orderBy('created_at', 'desc')->get();
        return view('admin.employee.index', compact('employees', 'ranks','banks','departments','empunions','qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ranks = Rank::orderBy('created_at', 'asc')->get();
        $banks = Bank::orderBy('created_at', 'asc')->get();
        $departments = Department::orderBy('created_at', 'asc')->get();
        $empunions = Empunion::orderBy('created_at', 'asc')->get();
        $qualifications = Qualification::orderBy('created_at', 'asc')->get();
        $employees = Employee::where('id', $id)->first();
        return view('admin.employee.index', compact('employees', 'ranks','banks','departments','empunions','qualifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
