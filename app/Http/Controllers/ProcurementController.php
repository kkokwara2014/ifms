<?php

namespace App\Http\Controllers;

use App\Department;
use App\Order;
use App\Procurement;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        $orders = Order::orderBy('created_at', 'desc')->get();
        $purchases = Procurement::orderBy('created_at', 'desc')->get();
        return view('admin.procurement.index', compact('purchases', 'departments', 'orders'));
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
            'order_id' => 'required',
            'department_id' => 'required',
            'amount' => 'required',
            'procdate' => 'required',
        ]);

        Procurement::create($request->all());
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
        $orders = Order::orderBy('created_at', 'desc')->get();
        $purchases = Procurement::where('id', $id)->first();
        return view('admin.procurement.edit', compact('purchases', 'departments', 'orders'));
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
            'order_id' => 'required',
            'department_id' => 'required',
            'amount' => 'required',
            'procdate' => 'required',
        ]);

        $procurement = Procurement::find($id);
        $procurement->order_id = $request->order_id;
        $procurement->department_id = $request->department_id;
        $procurement->amount = $request->amount;
        $procurement->procdate = $request->procdate;
        $procurement->narration = $request->narration;

        $procurement->save();

        return redirect(route('purchases.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $procurements = Procurement::where('id', $id)->delete();
        return redirect()->back();
    }
}
