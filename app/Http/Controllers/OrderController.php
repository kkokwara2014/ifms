<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use App\Supplier;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::orderBy('item', 'asc')->get();
        $suppliers = Supplier::orderBy('fullname', 'asc')->get();
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.index', compact('orders', 'stocks', 'suppliers'));
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
            'stock_id' => 'required',
            'supplier_id' => 'required',
            'qty' => 'required',
            'comment' => 'required',
        ]);

        Order::create($request->all());
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stocks = Stock::orderBy('item', 'asc')->get();
        $suppliers = Supplier::orderBy('fullname', 'asc')->get();
        $orders = Order::where('id', $id)->first();
        return view('admin.order.edit', compact('orders', 'stocks', 'suppliers'));
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
            'stock_id' => 'required',
            'supplier_id' => 'required',
            'qty' => 'required',
            'comment' => 'required',
        ]);

        $order = Order::find($id);
        $order->stock_id = $request->stock_id;
        $order->supplier_id = $request->supplier_id;
        $order->qty = $request->qty;
        $order->comment = $request->comment;

        $order->save();

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders=Order::where('id',$id)->delete();
        return redirect()->back();
    }
}
