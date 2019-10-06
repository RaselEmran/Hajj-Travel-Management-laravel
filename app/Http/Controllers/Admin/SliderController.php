<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use App\Slider;

class SliderController extends Controller
{
   private function route() {
    return 'admin.slider.';
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.index');
    }


    public function datatable(Request $request) {

        if ($request->ajax()) {
            $model = Slider::all();
            return Datatables::of($model)
            ->addIndexColumn()
            ->editColumn('image',function($model){
                $url= asset('storage/slider/'.$model->image);
                return '<img src="'.$url.'" border="0" width="120" class="img-rounded" align="center" />';
            })
            ->editColumn('status', function ($model) {
                $route =$this->route();
                return view('admin.status', compact('model','route'));
            })
            ->addColumn('action', function ($model) {
                return view('admin.slider.action', compact('model'));
            })->rawColumns(['action','status','image'])->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.slider.form');
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
            'btn_text' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255'],
            'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

        $slider =new Slider;
        if($request->hasFile('image')) {
          $storagepath = $request->file('image')->store('public/slider');
          $fileName = basename($storagepath);
          $slider->image = $fileName;
      }
      $slider->title =$request->title;
      $slider->btn_text =$request->btn_text;
      $slider->sub_title =$request->sub_title;
      $slider->save();

          return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Slider Uploaded'), 'goto' => route('admin.slider.index')]); 
      }
    }

    public function status(Request $request, $value, $id) {


        if (request()->ajax()) {
            $user = Slider::find($id);
            $user->status = $value;
            $user->save();

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
        $model =Slider::findOrfail($id);
        return view('admin.slider.form',compact('model'));
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
            'btn_text' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255'],
            'image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

        $slider =Slider::findOrfail($id);

        if ($request->hasFile('image')) {
          $storagepath = $request->file('image')->store('public/slider');
          $fileName = basename($storagepath);
          $slider->image = $fileName;

        //if file chnage then delete old one
          $oldFile = $request->get('oldimage', '');
          if ($oldFile != '') {
            $file_path = "public/slider" . $oldFile;
            Storage::delete($file_path);
            }
        } else {
          $slider->image = $request->get('oldimage', '');
      }

      $slider->title =$request->title;
      $slider->btn_text =$request->btn_text;
      $slider->sub_title =$request->sub_title;
      $slider->save();

      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Slider Updated'), 'goto' => route('admin.slider.index')]);

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
        $slider = Slider::find($id);
        unlink('storage/slider/'.$slider->image);
        $slider->delete();
        if ($slider) {
           return response()->json(['success' => true, 'status' => 'success', 'message' => 'Slider Information Delete Successfully.']);
       }
   }
}
}
