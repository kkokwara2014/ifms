<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Stock;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $inventories = Inventory::orderBy('name', 'asc')->get();
        $stocks=Stock::orderBy('created_at','desc')->get();
        return view('admin.stock.index', compact('stocks','inventories'));
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
            'inventory_id' => 'required',
            'item' => 'required',
            'qtyavailable' => 'required',
            'unitprice' => 'required',
            'datebought' => 'required',
        ]);

        Stock::create($request->all());
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
        $inventories = Inventory::orderBy('name', 'asc')->get();
        $stocks=Stock::where('id',$id)->first();
        return view('admin.stock.edit', compact('stocks','inventories'));
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
            'inventory_id' => 'required',
            'item' => 'required',
            'qtyavailable' => 'required',
            'unitprice' => 'required',
            'datebought' => 'required',
        ]);        

        $stock = Stock::find($id);
        $stock->inventory_id = $request->inventory_id;
        $stock->item = $request->item;
        $stock->qtyavailable = $request->qtyavailable;
        $stock->unitprice = $request->unitprice;
        $stock->description = $request->description;
        $stock->datebought = $request->datebought;

        $stock->save();

        return redirect(route('stock.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stocks=Stock::where('id',$id)->delete();
        return redirect()->back();
    }
}
