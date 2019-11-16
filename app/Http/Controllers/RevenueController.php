<?php

namespace App\Http\Controllers;

use App\Ledger;
use App\Mda;
use App\Revenue;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mdas = Mda::orderBy('name', 'asc')->get();
        $ledgers = Ledger::orderBy('name', 'asc')->get();
        $revenues = Revenue::orderBy('created_at', 'desc')->get();
        return view('admin.revenue.index', compact('revenues', 'mdas', 'ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mda_id' => 'required',
            'ledger_id' => 'required',
            'amount' => 'required',
            'narration' => 'required',
            'revtype' => 'required',
            'collectorname' => 'required',
            'collectorname' => 'required',
            'collectorphone' => 'required',
            'paidby' => 'required',
        ]);


        Revenue::create($request->all());
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
        $mdas = Mda::orderBy('name', 'asc')->get();
        $ledgers = Ledger::orderBy('name', 'asc')->get();
        $revenues = Revenue::where('id', $id)->first();
        return view('admin.revenue.edit', compact('revenues', 'mdas', 'ledgers'));
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
            'mda_id' => 'required',
            'ledger_id' => 'required',
            'amount' => 'required',
            'narration' => 'required',
            'revtype' => 'required',
            'collectorname' => 'required',
            'collectorname' => 'required',
            'collectorphone' => 'required',
            'paidby' => 'required',
        ]);

        $revenue = Revenue::find($id);
        $revenue->ledger_id = $request->ledger_id;
        $revenue->mda_id = $request->mda_id;
        $revenue->amount = $request->amount;
        $revenue->narration = $request->narration;
        $revenue->revtype = $request->revtype;
        $revenue->collectorname = $request->collectorname;
        $revenue->collectorphone = $request->collectorphone;
        $revenue->paidby = $request->paidby;


        $revenue->save();

        return redirect(route('revenues.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $revenues = Revenue::where('id', $id)->delete();
        return redirect()->back();
    }
}
