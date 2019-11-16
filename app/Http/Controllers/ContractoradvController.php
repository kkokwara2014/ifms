<?php

namespace App\Http\Controllers;

use App\Contractor;
use App\Contractoradv;
use App\Ledger;
use Illuminate\Http\Request;

class ContractoradvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = Ledger::orderBy('created_at', 'asc')->get();
        $contractors = Contractor::orderBy('created_at', 'asc')->get();
        $contractoradvs = Contractoradv::orderBy('created_at', 'desc')->get();
        return view('admin.contractoradv.index', compact('contractoradvs', 'ledgers', 'contractors'));
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
            'contractor_id' => 'required',
            'amount' => 'required',
            'purpose' => 'required',
            'awardedby' => 'required',
        ]);

        Contractoradv::create($request->all());
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
        $contractors = Contractor::orderBy('created_at', 'asc')->get();
        $contractoradvs = Contractoradv::where('id', $id)->first();
        return view('admin.contractoradv.edit', compact('contractoradvs', 'ledgers', 'contractors'));
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
            'ledger_id' => 'required',
            'contractor_id' => 'required',
            'amount' => 'required',
            'purpose' => 'required',
            'awardedby' => 'required',
        ]);
        

        $contractoradv = Contractoradv::find($id);
        $contractoradv->ledger_id = $request->ledger_id;
        $contractoradv->contractor_id = $request->contractor_id;
        $contractoradv->amount = $request->amount;
        $contractoradv->purpose = $request->purpose;
        $contractoradv->awardedby = $request->awardedby;
        

        $contractoradv->save();

        return redirect(route('contractoradv.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contractoradvs = Contractoradv::where('id', $id)->delete();
        return redirect()->back();
    }
}
