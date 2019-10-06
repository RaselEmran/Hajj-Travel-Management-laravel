<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use App\ServiceSlider;


class ServiceSliderController extends Controller
{

     private function route() {
       return 'admin.service-slider.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.slider.index');
    }

     public function datatable(Request $request) {

     if ($request->ajax()) {
        $model = ServiceSlider::all();
        return Datatables::of($model)
        ->addIndexColumn()
        ->editColumn('image',function($model){
            $url= asset('storage/service/slider/'.$model->image);
            return '<img src="'.$url.'" border="0" width="120" class="img-rounded" align="center" />';
        })
        ->editColumn('description',function($model){
            $text ='<span class="badge badge-info">description:</span></br>'.$model->title1.'</br>';
            return $text;
        })
        ->editColumn('status', function ($model) {
            $route =$this->route();
            return view('admin.status', compact('model','route'));
        })
        ->addColumn('action', function ($model) {
            return view('admin.service.slider.action', compact('model'));
        })->rawColumns(['action','status','image','description'])->make(true);
    }
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.service.slider.form');
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
                'title1' => ['required', 'max:255'],
                'sub_title1' => ['required', 'max:255'],
                'title2' => ['required', 'max:255'],
                'sub_title2' => ['required', 'max:255'],
                'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
            ]);


            $serviceslider =new ServiceSlider;
            if($request->hasFile('image')) {
              $storagepath = $request->file('image')->store('public/service/slider');
              $fileName = basename($storagepath);
              $serviceslider->image = $fileName;
          }
          $serviceslider->title1 =$request->title1;
          $serviceslider->sub_title1 =$request->sub_title1;
          $serviceslider->title2 =$request->title2;
          $serviceslider->sub_title2 =$request->sub_title2;
          $serviceslider->save();

          return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Service Slider Inserted'), 'goto' => route('admin.service-slider.index')]); 
      }
    }

      public function status(Request $request, $value, $id) {


    if (request()->ajax()) {
        $service = ServiceSlider::find($id);
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
         $model =ServiceSlider::findOrfail($id);
         return view('admin.service.slider.form',compact('model'));
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
                'title1' => ['required', 'max:255'],
                'sub_title1' => ['required', 'max:255'],
                'title2' => ['required', 'max:255'],
                'sub_title2' => ['required', 'max:255'],
                'image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            ]);

        $service =ServiceSlider::findOrfail($id);

        if ($request->hasFile('image')) {
          $storagepath = $request->file('image')->store('public/service/slider');
          $fileName = basename($storagepath);
          $service->image = $fileName;

        //if file chnage then delete old one
          $oldFile = $request->get('oldimage', '');
          if ($oldFile != '') {
            $file_path = "public/service/slider" . $oldFile;
            Storage::delete($file_path);
        }
        } 
     else {
          $service->image = $request->get('oldimage', '');
         }

          $service->title1 =$request->title1;
          $service->sub_title1 =$request->sub_title1;
          $service->title2 =$request->title2;
          $service->sub_title2 =$request->sub_title2;
          $service->save();
          return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('service Slider Updated'), 'goto' => route('admin.service-slider.index')]);

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
            $service = ServiceSlider::find($id);
            unlink('storage/service/slider/'.$service->image);
            $service->delete();
            if ($service) {
             return response()->json(['success' => true, 'status' => 'success', 'message' => 'Service Slider Information Delete Successfully.']);
         }
     }
    }
}
