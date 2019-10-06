<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Setting;
use Carbon\Carbon;

class SettingController extends Controller
{
       public function index(Request $request)
   {
   	if ($request->isMethod('get')) {
      return view('admin.setting.index');
  	 }
    else{
  	   	 	$validator = Validator::make($request->all(), [
			'logo' => 'mimes:jpeg,bmp,png,jpg|max:2000',
			'favicon' => 'mimes:jpeg,bmp,png,jpg|max:2000',
		       ]);

	     if ($validator->fails()) {
            return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
              }



          foreach($_POST as $key => $value){
				 if($key == "_token"){
					 continue;
				 }	 
				 $data = array();
				 $data['value'] = $value; 
				 $data['updated_at'] = Carbon::now();
				 if(Setting::where('name', $key)->exists()){				
					Setting::where('name','=',$key)->update($data);			
				 }else{
					$data['name'] = $key; 
					$data['created_at'] = Carbon::now();
					Setting::insert($data); 
				 }
		    }

		   if($request->hasFile('logo')) {
                $storagepath = $request->file('logo')->store('public/logo');
                $fileName = basename($storagepath);
                $logo['name']='logo';
                $logo['value'] = $fileName;

                //if file chnage then delete old one
                $oldFile = $request->get('oldLogo','');
                if( $oldFile != ''){
                    $file_path = "public/logo/".$oldFile;
                    Storage::delete($file_path);
                }
            }
            else{
            	$logo['name']='logo';
                $logo['value'] = $request->get('oldLogo','');
            }

             if($request->hasFile('favicon')) {
                $storagepath = $request->file('favicon')->store('public/favicon');
                $fileName = basename($storagepath);
                $data1['name']='favicon';
                $data1['value'] = $fileName;

                //if file chnage then delete old one
                $oldFile = $request->get('oldfavicon','');
                if( $oldFile != ''){
                    $file_path = "public/favicon/".$oldFile;
                    Storage::delete($file_path);
                }
            }
            else{
            	$data1['name']='favicon';
                $data1['value'] = $request->get('oldfavicon','');
               }

           if(Setting::where('name', "logo")->exists()){				
				Setting::where('name','=',"logo")->update($logo);			
			}else{
				 
				$logo['created_at'] = Carbon::now();
				Setting::insert($logo); 
			}

			if(Setting::where('name', "favicon")->exists()){				
				Setting::where('name','=',"favicon")->update($data1);			
			}else{ 
				$data1['created_at'] = Carbon::now();
				Setting::insert($data1); 
			}

		   return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('System Configuration Updated.')]);
  	 }
   }
}
