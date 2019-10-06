<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\Option;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
  private function route() {
    return 'admin.package.';
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('admin.package.index');
   }



   public function datatable(Request $request) {

    if ($request->ajax()) {
      $model = Package::all();
      return Datatables::of($model)
      ->addIndexColumn()
      ->editColumn('image',function($model){
        $url= asset('storage/packege/'.$model->photo);
        return '<img src="'.$url.'" border="0" width="120" class="img-rounded" align="center" />';
      })
      ->editColumn('status', function ($model) {
        $route =$this->route();
        return view('admin.status', compact('model','route'));
      })
      ->addColumn('action', function ($model) {
        return view('admin.package.action', compact('model'));
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
      $option =Option::all()->pluck('name','id')->prepend(_lang('Select One'), '');
      return view('admin.package.form',compact('option'));
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
          'name' => ['required', 'max:255'],
          'duration' => ['required'],
          'start' => ['required', 'date'],
          'end' => ['required', 'date'],
          'type' => ['required', 'max:255'],
          'option.id' => ['required', 'integer'],
          'description' => ['required'],
          'itinary' => ['required'],
          'price' => ['required', 'numeric'],
          'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
          'banner' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

        $package =new Package;
        if($request->hasFile('photo')) {
          $storagepath = $request->file('photo')->store('public/packege');
          $fileName = basename($storagepath);
          $package->photo = $fileName;
        }

        if($request->hasFile('banner')) {
          $storagepath = $request->file('banner')->store('public/packege');
          $fileName = basename($storagepath);
          $package->banner = $fileName;
        }

        $package->name=$request->name;  
        $package->slug=str_slug($request->name);
        $package->duration =$request->duration;  
        $package->start =$request->start;  
        $package->end =$request->end;  
        $package->type =$request->type;  
        $package->option_id =$request->option['id'];  
        $package->description =$request->description;  
        $package->location =$request->location;  
        $package->itinary =$request->itinary;  
        $package->price =$request->price;  
        $package->policy =$request->policy;  
        $package->hotel =$request->hotel;  
        $package->term_condition =$request->term_condition;   
        $package->meta_title =$request->meta_title;   
        $package->meta_keyword =$request->meta_keyword;   
        $package->meta_description =$request->meta_description; 
        $package->save();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Package Incude'), 'goto' => route('admin.package.index')]);  
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $option =Option::all()->pluck('name','id')->prepend(_lang('Select One'), '');
      $model =Package::findOrfail($id);
      return view('admin.package.form',compact('model','option'));
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
          'name' => ['required', 'max:255'],
           'duration' => ['required'],
          'start' => ['required', 'date'],
          'end' => ['required', 'date'],
          'type' => ['required', 'max:255'],
          'option.id' => ['required', 'integer'],
          'description' => ['required'],
          'itinary' => ['required'],
          'price' => ['required', 'numeric'],
          'photo' => 'mimes:jpeg,bmp,png,jpg|max:2000',
          'banner' => 'mimes:jpeg,bmp,png,jpg|max:2000',
        ]);
        $package =Package::findOrfail($id);

        if ($request->hasFile('photo')) {
          $storagepath = $request->file('photo')->store('public/packege');
          $fileName = basename($storagepath);
          $package->photo = $fileName;

        //if file chnage then delete old one
          $oldFile = $request->get('oldphoto', '');
          if ($oldFile != '') {
            $file_path = "public/packege" . $oldFile;
            Storage::delete($file_path);
          }
        } else {
          $package->photo = $request->get('oldphoto', '');
        }

      //
        if ($request->hasFile('banner')) {
          $storagepath = $request->file('banner')->store('public/packege');
          $fileName = basename($storagepath);
          $package->banner = $fileName;

        //if file chnage then delete old one
          $oldFile = $request->get('oldbanner', '');
          if ($oldFile != '') {
            $file_path = "public/packege" . $oldFile;
            Storage::delete($file_path);
          }
        } else {
          $package->banner = $request->get('oldbanner', '');
        }

        $package->name=$request->name;  
        $package->slug=str_slug($request->name);
        $package->duration =$request->duration;  
        $package->start =$request->start;  
        $package->end =$request->end;  
        $package->type =$request->type;  
        $package->option_id =$request->option['id'];  
        $package->description =$request->description;  
        $package->location =$request->location;  
        $package->itinary =$request->itinary;  
        $package->price =$request->price;  
        $package->policy =$request->policy;  
        $package->hotel =$request->hotel;  
        $package->term_condition =$request->term_condition;   
        $package->meta_title =$request->meta_title;   
        $package->meta_keyword =$request->meta_keyword;   
        $package->meta_description =$request->meta_description; 
        $package->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Package Update'), 'goto' => route('admin.package.index')]); 
      }
    }

    public function status(Request $request, $value, $id) {


      if (request()->ajax()) {
        $user = Package::find($id);
        $user->status = $value;
        $user->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Status Updated')]);
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
        $package = Package::find($id);
        unlink('storage/packege/'.$package->photo);
        unlink('storage/packege/'.$package->banner);
        $package->delete();
        if ($package) {
         return response()->json(['success' => true, 'status' => 'success', 'message' => 'Packege Information Delete Successfully.']);
       }
     }
   }
 }
