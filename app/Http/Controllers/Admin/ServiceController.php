<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Service;

class ServiceController extends Controller
{

 private function route() {
    return 'admin.service.';
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('admin.service.index');
 }




 public function datatable(Request $request) {

    if ($request->ajax()) {
        $model = Service::all();
        return Datatables::of($model)
        ->addIndexColumn()
        ->editColumn('icon',function($model){
            $url= asset('storage/service/'.$model->icon);
            return '<img src="'.$url.'" border="0" width="120" class="img-rounded" align="center" />';
        })
        ->editColumn('text',function($model){
            return str_limit($model->text, 250, '....');
        })
        ->editColumn('status', function ($model) {
            $route =$this->route();
            return view('admin.status', compact('model','route'));
        })
        ->addColumn('action', function ($model) {
            return view('admin.service.action', compact('model'));
        })->rawColumns(['action','status','icon','text'])->make(true);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.form');
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
                'title' => ['required', 'max:255'],
                'text' => ['required'],
                'icon' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
            ]);

            $count =Service::count();
            if ($count>=0) {
               throw ValidationException::withMessages(['message' => _lang('Maximum Limit In 4."')]);
            }


            $service =new Service;
            if($request->hasFile('icon')) {
              $storagepath = $request->file('icon')->store('public/service');
              $fileName = basename($storagepath);
              $service->icon = $fileName;
          }
          $service->title =$request->title;
          $service->text =$request->text;
          $service->save();

          return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Service Inserted'), 'goto' => route('admin.service.index')]); 
      }
  }

  public function status(Request $request, $value, $id) {


    if (request()->ajax()) {
        $service = Service::find($id);
        $service->status = $value;
        $service->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Status Updated')]);
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
    public function edit($id)
    {
       $model =Service::findOrfail($id);
       return view('admin.service.form',compact('model'));
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
            'title' => ['required', 'max:255'],
            'text' => ['required'],
            'icon' => 'mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

        $service =Service::findOrfail($id);

        if ($request->hasFile('icon')) {
          $storagepath = $request->file('icon')->store('public/service');
          $fileName = basename($storagepath);
          $service->icon = $fileName;

        //if file chnage then delete old one
          $oldFile = $request->get('oldicon', '');
          if ($oldFile != '') {
            $file_path = "public/service" . $oldFile;
            Storage::delete($file_path);
        }
        } 
     else {
          $service->icon = $request->get('oldicon', '');
         }

          $service->title =$request->title;
          $service->text =$request->text;
          $service->save();

          return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('service Updated'), 'goto' => route('admin.service.index')]);

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
            $service = Service::find($id);
            unlink('storage/service/'.$service->icon);
            $service->delete();
            if ($service) {
             return response()->json(['success' => true, 'status' => 'success', 'message' => 'Service Information Delete Successfully.']);
         }
     }
 }
}
