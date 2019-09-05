<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::orderBy('created_at','desc')->get();
        return view('admin.supplier.index',compact('suppliers'));
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
            'supnumber' => 'required|min:3',
            'fullname' => 'required|min:3',
            'compname' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        Supplier::create($request->all());
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
        $suppliers=Supplier::where('id',$id)->first();
        return view('admin.supplier.edit', compact('suppliers'));
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
            'supnumber' => 'required|min:3',
            'fullname' => 'required|min:3',
            'compname' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $supplier=Supplier::find($id);
        $supplier->supnumber=$request->contnumber;
        $supplier->fullname=$request->fullname;
        $supplier->compname=$request->compname;
        $supplier->address=$request->address;
        $supplier->phone=$request->phone;
        $supplier->email=$request->email;
        $supplier->save();

        return redirect(route('supplier.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suppliers=Supplier::where('id',$id)->delete();
        return redirect()->back();
    }
}
