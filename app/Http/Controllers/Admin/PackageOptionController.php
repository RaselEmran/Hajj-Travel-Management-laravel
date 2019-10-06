<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use App\Option;

class PackageOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.package.option.index');
    }


     public function datatable(Request $request) {

        if ($request->ajax()) {
            $model = Option::all();
            return Datatables::of($model)
            ->addIndexColumn()
            
            ->addColumn('action', function ($model) {
                return view('admin.package.option.action', compact('model'));
            })->rawColumns(['action'])->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     if ($request->ajax()) {
         return view('admin.package.option.form');
     }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      if ($request->ajax()) {

           $validator = $request->validate([
            'option' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
        ]);

           $option =new Option;
           $option->name =$request->name;
           $option->option =$request->option;
           $option->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Package Option Inserted')]); 
       }
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
    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {
            $model =Option::findOrfail($id);
         return view('admin.package.option.form',compact('model'));
     }
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
        if ($request->ajax()) {

           $validator = $request->validate([
            'option' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
        ]);

           $option =Option::findOrfail($id);
           $option->name =$request->name;
           $option->option =$request->option;
           $option->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Package Option Updated')]); 
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if ($request->ajax()) {
        $option = Option::find($id);
        $option->delete();
        if ($option) {
         return response()->json(['success' => true, 'status' => 'success', 'message' => 'Package Option Information Delete Successfully.']);
       }
    }
    }
}
