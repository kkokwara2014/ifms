<?php

namespace App\Http\Controllers;

use App\Ledger;
use App\Orderadv;
use App\Stock;
use App\Supplier;
use Illuminate\Http\Request;

class OrderadvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = Ledger::orderBy('created_at', 'asc')->get();
        $suppliers = Supplier::orderBy('created_at', 'asc')->get();
        $stocks = Stock::orderBy('created_at', 'asc')->get();
        $orderadvs = Orderadv::orderBy('created_at', 'desc')->get();
        return view('admin.orderadv.index', compact('orderadvs', 'ledgers', 'suppliers','stocks'));
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
            'supplier_id' => 'required',
            'stock_id' => 'required',
            'amount' => 'required',
            'qty' => 'required',
            'description' => 'required',
        ]);

        Orderadv::create($request->all());
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
        $suppliers = Supplier::orderBy('created_at', 'asc')->get();
        $stocks = Stock::orderBy('created_at', 'asc')->get();
        $orderadvs = Orderadv::where('id', $id)->first();
        return view('admin.orderadv.edit', compact('orderadvs', 'ledgers', 'suppliers','stocks'));
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
            'supplier_id' => 'required',
            'stock_id' => 'required',
            'amount' => 'required',
            'qty' => 'required',
            'description' => 'required',
        ]);

        $orderadv = Orderadv::find($id);
        $orderadv->ledger_id = $request->ledger_id;
        $orderadv->supplier_id = $request->supplier_id;
        $orderadv->stock_id = $request->stock_id;
        $orderadv->amount = $request->amount;
        $orderadv->qty = $request->qty;
        $orderadv->description = $request->description;
        

        $orderadv->save();

        return redirect(route('orderadvs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderadvs = Orderadv::where('id', $id)->delete();
        return redirect()->back();
    }
}
