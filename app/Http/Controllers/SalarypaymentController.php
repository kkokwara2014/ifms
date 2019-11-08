<?php

namespace App\Http\Controllers;

use App\Mda;
use App\Salarypayment;
use Illuminate\Http\Request;

class SalarypaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mdas = Mda::orderBy('name', 'asc')->get();
        $salarypayments=Salarypayment::orderBy('created_at','desc')->get();
        return view('admin.salarypayment.index', compact('salarypayments','mdas'));
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
            'mda_id' => 'required',
            'amount' => 'required',
            'salarymonthyear' => 'required',
        ]);

        Salarypayment::create($request->all());
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
        $salarypayments=Salarypayment::where('id',$id)->first();
        return view('admin.salarypayment.edit', compact('salarypayments','mdas'));
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
            'amount' => 'required',
            'salarymonthyear' => 'required',
        ]);

        $salarypayment = Salarypayment::find($id);
        $salarypayment->mda_id = $request->mda_id;
        $salarypayment->amount = $request->amount;
        $salarypayment->salarymonthyear = $request->salarymonthyear;
        
        $salarypayment->save();

        return redirect(route('salarypayments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salarypayments=Salarypayment::where('id',$id)->delete();
        return redirect()->back();
    }
}
