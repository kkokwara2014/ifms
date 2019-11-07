<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Budgetcategory;
use App\Department;
use App\Ledger;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        $budgetCategories = Budgetcategory::orderBy('created_at', 'desc')->get();
        $budgets = Budget::orderBy('created_at', 'desc')->get();
        $ledgers = Ledger::orderBy('created_at', 'desc')->get();
        return view('admin.budget.index', compact('budgets', 'departments', 'budgetCategories', 'ledgers'));
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
            'department_id' => 'required',
            'budgetcategory_id' => 'required',
            'amount' => 'required',
            'reason' => 'required',
            'ledger_id' => 'required',
        ]);

        Budget::create($request->all());
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
        $departments = Department::orderBy('name', 'asc')->get();
        $budgetCategories = Budgetcategory::orderBy('created_at', 'desc')->get();
        $budgets = Budget::where('id', $id)->first();
        $ledgers = Ledger::orderBy('created_at', 'desc')->get();
        return view('admin.budget.edit', compact('budgets', 'departments', 'budgetCategories', 'ledgers'));
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
            'department_id' => 'required',
            'budgetcategory_id' => 'required',
            'amount' => 'required',
            'reason' => 'required',
            'ledger_id' => 'required',
        ]);

        $budget = budget::find($id);
        $budget->department_id = $request->department_id;
        $budget->budgetcategory_id = $request->budgetcategory_id;
        $budget->amount = $request->amount;
        $budget->reason = $request->reason;
        $budget->ledger_id = $request->ledger_id;

        $budget->save();

        return redirect(route('budgets.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budgets=Budget::where('id',$id)->delete();
        return redirect()->back();
    }
}
