<?php

namespace App\Http\Controllers;

use App\Fromwho;
use App\Grant;
use Illuminate\Http\Request;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fromwhos = Fromwho::orderBy('created_at', 'asc')->get();
        $grants = Grant::orderBy('created_at', 'desc')->get();
        return view('admin.grant.index', compact('grants', 'fromwhos'));
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
            'amount' => 'required',
            'comment' => 'required',
            'fromwho_id' => 'required',
        ]);

        Grant::create($request->all());
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
        $fromwhos = Fromwho::orderBy('created_at', 'asc')->get();
        $grants = Grant::where('id', $id)->first();
        return view('admin.grant.edit', compact('grants', 'fromwhos'));
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
            'amount' => 'required',
            'comment' => 'required',
            'fromwho_id' => 'required',
        ]);

        $grant = Grant::find($id);
        $grant->amount = $request->amount;
        $grant->comment = $request->comment;
        $grant->fromwho_id = $request->fromwho_id;
                
        $grant->save();

        return redirect(route('grants.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grants = Grant::where('id', $id)->delete();
        return redirect()->back();
    }
}
