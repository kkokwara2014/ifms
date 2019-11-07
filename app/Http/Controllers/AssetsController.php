<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Department;
use App\Inventory;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        $inventories = Inventory::orderBy('name', 'asc')->get();
        $assets=Asset::orderBy('created_at','desc')->get();
        return view('admin.asset.index', compact('assets','departments','inventories'));
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
            'name' => 'required',
            'acquisitiondate' => 'required',
            'department_id' => 'required',
            'inventory_id' => 'required',
        ]);

        Asset::create($request->all());
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
        $inventories = Inventory::orderBy('name', 'asc')->get();
        $assets=Asset::where('id',$id)->first();
        
        return view('admin.asset.edit', compact('assets','departments','inventories'));
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
            'name' => 'required',
            'acquisitiondate' => 'required',
            'department_id' => 'required',
            'inventory_id' => 'required',
        ]);

        $asset = Asset::find($id);
        $asset->name = $request->name;
        $asset->description = $request->description;
        $asset->acquisitiondate = $request->acquisitiondate;
        $asset->department_id = $request->department_id;
        $asset->inventory_id = $request->inventory_id;

        $asset->save();

        return redirect(route('asset.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assets=Asset::where('id',$id)->delete();
        return redirect()->back();
    }
}
