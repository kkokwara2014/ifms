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
        $ranks = Rank::orderBy('name', 'asc')->get();
        $banks = Bank::orderBy('name', 'asc')->get();
        $departments = Department::orderBy('name', 'asc')->get();
        $empunions = Empunion::orderBy('name', 'asc')->get();
        $qualifications = Qualification::orderBy('name', 'asc')->get();
        $employees = Employee::orderBy('created_at', 'desc')->get();
        return view('admin.employee.index', compact('employees', 'ranks', 'banks', 'departments', 'empunions', 'qualifications'));
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
        $this->validate($request, [
            'fullname' => 'required',
            'compname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'maritalstatus' => 'required',
            'appointmentdate' => 'required',
            'bank_id' => 'required',
            'bankaccount' => 'required',
            'basicsalary' => 'required',
            'totalallow' => 'required',
            'department_id' => 'required',
            'empunion_id' => 'required',
            'rank_id' => 'required',
            'qualification_id' => 'required',

        ]);

        Employee::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ranks = Rank::orderBy('name', 'asc')->get();
        $banks = Bank::orderBy('name', 'asc')->get();
        $departments = Department::orderBy('name', 'asc')->get();
        $empunions = Empunion::orderBy('name', 'asc')->get();
        $qualifications = Qualification::orderBy('name', 'asc')->get();
        $employees = Employee::where('id', $id)->first();
        return view('admin.employee.show', compact('employees', 'ranks', 'banks', 'departments', 'empunions', 'qualifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ranks = Rank::orderBy('name', 'asc')->get();
        $banks = Bank::orderBy('name', 'asc')->get();
        $departments = Department::orderBy('name', 'asc')->get();
        $empunions = Empunion::orderBy('name', 'asc')->get();
        $qualifications = Qualification::orderBy('name', 'asc')->get();
        $employees = Employee::where('id', $id)->first();
        return view('admin.employee.index', compact('employees', 'ranks', 'banks', 'departments', 'empunions', 'qualifications'));
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
        $this->validate($request, [
            'fullname' => 'required',
            'compname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'maritalstatus' => 'required',
            'appointmentdate' => 'required',
            'bank_id' => 'required',
            'bankaccount' => 'required',
            'basicsalary' => 'required',
            'totalallow' => 'required',
            'department_id' => 'required',
            'empunion_id' => 'required',
            'rank_id' => 'required',
            'qualification_id' => 'required',

        ]);

        $employee = Employee::find($id);
        $employee->ledger_id = $request->ledger_id;
        $employee->supplier_id = $request->supplier_id;
        $employee->stock_id = $request->stock_id;
        $employee->amount = $request->amount;
        $employee->qty = $request->qty;
        $employee->description = $request->description;


        $employee->save();

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banks=Bank::where('id',$id)->delete();
        return redirect()->back();
    }
}
