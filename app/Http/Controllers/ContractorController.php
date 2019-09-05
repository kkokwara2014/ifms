<?php

namespace App\Http\Controllers;

use App\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contractors=Contractor::orderBy('created_at','desc')->get();
        return view('admin.contractor.index',compact('contractors'));
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
            'contnumber' => 'required|min:3',
            'fullname' => 'required|min:3',
            'compname' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        Contractor::create($request->all());
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
        $contractors=Contractor::where('id',$id)->first();
        return view('admin.contractor.edit', compact('contractors'));
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
            'contnumber' => 'required|min:3',
            'fullname' => 'required|min:3',
            'compname' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $contractor=Contractor::find($id);
        $contractor->contnumber=$request->contnumber;
        $contractor->fullname=$request->fullname;
        $contractor->compname=$request->compname;
        $contractor->address=$request->address;
        $contractor->phone=$request->phone;
        $contractor->email=$request->email;
        $contractor->save();

        return redirect(route('contractor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contractors=Contractor::where('id',$id)->delete();
        return redirect()->back();
    }
}
