<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Expenditure;
use App\Ledger;
use App\Procurement;
use App\Salarypayment;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = Ledger::orderBy('created_at', 'asc')->get();
        $budgets = Budget::orderBy('created_at', 'asc')->get();
        $procurements = Procurement::orderBy('created_at', 'asc')->get();
        $salarypayments = Salarypayment::orderBy('created_at', 'asc')->get();
        $expenditures=Expenditure::orderBy('created_at','desc')->get();
        return view('admin.expenditure.index', compact('expenditures','ledgers','budgets','procurements','salarypayments'));
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
            'ledger_id' => 'required',
            'budget_id' => 'required',
            'procurement_id' => 'required',
            'salarypayment_id' => 'required',
            'datecaptured' => 'required',
            'expendtype' => 'required',
        ]);

        Expenditure::create($request->all());
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
        $ledgers = Ledger::orderBy('created_at', 'asc')->get();
        $budgets = Budget::orderBy('created_at', 'asc')->get();
        $procurements = Procurement::orderBy('created_at', 'asc')->get();
        $salarypayments = Salarypayment::orderBy('created_at', 'asc')->get();
        $expenditures=Expenditure::where('id',$id)->first();
        return view('admin.expenditure.index', compact('expenditures','ledgers','budgets','procurements','salarypayments'));
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
