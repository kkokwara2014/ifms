<?php

namespace App\Http\Controllers;

use App\Accountpayable;
use App\Accountreceivable;
use App\Ledger;
use Illuminate\Http\Request;

class AccountreceivableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = Ledger::orderBy('created_at', 'asc')->get();
        $accountreceivables = Accountreceivable::orderBy('created_at', 'desc')->get();
        return view('admin.accountreceivable.index', compact('accountreceivables', 'ledgers'));
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
            'customername' => 'required',
            'phone' => 'required',
            'amount' => 'required',
            'narration' => 'required',
        ]);

        Accountreceivable::create($request->all());
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
        $accountreceivables = Accountreceivable::where('id', $id)->first();
        return view('admin.accountreceivable.edit', compact('accountreceivables', 'ledgers'));
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
            'customername' => 'required',
            'phone' => 'required',
            'amount' => 'required',
            'narration' => 'required',
        ]);

        $accountreceivable = Accountreceivable::find($id);
        $accountreceivable->ledger_id = $request->ledger_id;
        $accountreceivable->customername = $request->customername;
        $accountreceivable->phone = $request->phone;
        $accountreceivable->email = $request->email;
        $accountreceivable->amount = $request->amount;
        $accountreceivable->narration = $request->narration;

        $accountreceivable->save();

        return redirect(route('accountreceivables.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accountreceivables = Accountreceivable::where('id', $id)->delete();
        return redirect()->back();
    }
}
