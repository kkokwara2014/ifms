<?php

namespace App\Http\Controllers;

use App\Accountpayable;
use App\Ledger;
use Illuminate\Http\Request;

class AccountpayableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = Ledger::orderBy('created_at', 'asc')->get();
        $accountpayables=Accountpayable::orderBy('created_at','desc')->get();
        return view('admin.accountpayable.index', compact('accountpayables','ledgers'));
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
            'creditorname' => 'required',
            'phone' => 'required',
            'amount' => 'required',
            'narration' => 'required',
        ]);

        Accountpayable::create($request->all());
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
        $accountpayables=Accountpayable::where('id',$id)->first();
        return view('admin.accountpayable.edit', compact('accountpayables','ledgers'));
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
            'creditorname' => 'required',
            'phone' => 'required',
            'amount' => 'required',
            'narration' => 'required',
        ]);

        $accountpayable = Accountpayable::find($id);
        $accountpayable->ledger_id = $request->ledger_id;
        $accountpayable->creditorname = $request->creditorname;
        $accountpayable->phone = $request->phone;
        $accountpayable->email = $request->email;
        $accountpayable->amount = $request->amount;
        $accountpayable->narration = $request->narration;
        
        $accountpayable->save();

        return redirect(route('accountpayables.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accountpayables = Accountpayable::where('id', $id)->delete();
        return redirect()->back();
    }
}
