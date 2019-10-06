<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Admin;
use Validator;
use Illuminate\Validation\Rule;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UiController extends Controller
{
   public function index()
   {
   	$id =Auth::user()->id;
   	$user =Admin::findOrFail($id);
    return view('admin.user.profile',compact('user'));
   }

         public function postprofile(Request $request)
   {
   	  if ($request->ajax()) {
   	  	    $id =Auth::user()->id;
        	$model =Admin::findOrFail($id);
			$validator = Validator::make($request->all(),[
				'photo' => 'mimes:jpeg,bmp,png,jpg,gif|max:2000',
				'email' => ['required','email', 'max:255',
				Rule::unique('admins', 'email')->ignore($model->id)],
			]);
			
        	$file_exit=$model->image;
        	 if($file_exit && $request->hasFile('image'))
        	 {
        	 	Storage::delete('public/user/photo/'.$file_exit);
        	 	$storagepath = $request->file('image')->store('public/user/photo');
                $fileName = basename($storagepath);
        	 }
        	 elseif ($file_exit) {
				$fileName =$file_exit;
			}
			else
			{
				$storagepath = $request->file('image')->store('public/user/photo');
                $fileName = basename($storagepath);
			}
			$model->surname =$request->surname;
			$model->first_name =$request->first_name;
			$model->last_name =$request->last_name;
			$model->name =$request->name;
			$model->phone =$request->phone;
			$model->image =$fileName;
			$model->save();
			return response()->json(['message' => _lang('Profile Update.')]);
		}
   }

      public function password_change(Request $request)
   {
   	 if ($request->ajax()) {
			$validator = $request->validate([
		     'password' => ['required', 'string', 'min:6', 'confirmed'],
			]);

			$id =Auth::user()->id;
        	$model =User::findOrFail($id);
        	$model->password=bcrypt($request->password);
        	$model->save();
        	return $this->success(['message' => _lang('Password Change.')]);
		}
   }
}
