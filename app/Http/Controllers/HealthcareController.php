<?php

namespace App\Http\Controllers;

use App\Healthcare;
use App\Institutype;
use App\Ledger;
use Illuminate\Http\Request;

class HealthcareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = Ledger::orderBy('created_at', 'asc')->get();
        $institutypes = Institutype::orderBy('created_at', 'asc')->get();
        $healthcares = Healthcare::orderBy('created_at', 'desc')->get();
        return view('admin.healthcare.index', compact('healthcares', 'ledgers','institutypes'));
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
            'institutype_id' => 'required',
            'ledger_id' => 'required',
            'hccode' => 'required',
            'hcname' => 'required',
            'amount' => 'required',
            
        ]);

        Healthcare::create($request->all());
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
        $institutypes = Institutype::orderBy('created_at', 'asc')->get();
        $healthcares = Healthcare::where('id', $id)->first();
        return view('admin.healthcare.edit', compact('healthcares', 'ledgers','institutypes'));
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
            'institutype_id' => 'required',
            'ledger_id' => 'required',
            'hccode' => 'required',
            'hcname' => 'required',
            'amount' => 'required',
            
        ]);
        
        $healthcare = Healthcare::find($id);
        $healthcare->institutype_id = $request->institutype_id;
        $healthcare->ledger_id = $request->ledger_id;
        $healthcare->hccode = $request->hccode;
        $healthcare->hcname = $request->hcname;
        $healthcare->amount = $request->amount;
     

        $healthcare->save();

        return redirect(route('healthcares.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $healthcares=Healthcare::where('id',$id)->delete();
        return redirect()->back();
    }
}
