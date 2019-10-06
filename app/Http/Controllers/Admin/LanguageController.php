<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class LanguageController extends Controller
{
	public function index(Request $request)
	{
		if ($request->isMethod('get')) {
			return view('admin.language.index');
		}
	}

	public function create(Request $request)
	{
		if ($request->isMethod('get')) {
			return view('admin.language.create');
		}

		else{

			@ini_set('max_execution_time', 0);
			@set_time_limit(0);
			
			$validator = Validator::make($request->all(), [
				'language_name' => 'required|alpha|string|max:30',
			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			
			$name = $request->language_name;
			
			if(file_exists(resource_path() . "/language/$name.php")){
				throw ValidationException::withMessages([
					'messege' => [_lang('Language already exists')],
				]);
				
			}
			
			$language = file_get_contents(resource_path() . "/language/language.php");
			$new_file = fopen(resource_path() . "/language/$name.php",'w+');
			fwrite($new_file,$language);
			fclose($new_file);
			
			return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Language Created Sucessfully'),'goto'=>route('admin.language')]);
			
		}
	}

	
	public function edit(Request $request,$id="")
	{

		if ($request->isMethod('get')) {
			if(file_exists(resource_path() . "/language/$id.php")){
				require (resource_path() . "/language/$id.php");
				return view('admin.language.edit',compact('language','id'));
			}
		}
	}

	public function update(Request $request,$id)
	{
		@ini_set('max_execution_time', 0);
		@set_time_limit(0);
		
		$contents="<?php \n\n";
		$contents.='$language=array();'."\n\n";	  
		foreach($_POST['language'] as $key => $value){
			$contents.='$language["'.$key.'"]="'.$value.'";'."\n";
		}

		$file = fopen(resource_path() . "/language/$id.php","w");
		
		if(fwrite($file, $contents)){
			return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Updated Sucessfully'),'goto'=>route('admin.language')]);
			
		}else{

			throw ValidationException::withMessages([
				'messege' => [_lang('Update failed')],
			]);
			
		}
	}

	public function delete($id)
	{

		if(file_exists(resource_path() . "/language/$id.php")){
			unlink(resource_path() . "/language/$id.php");
			return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Deleted Sucessfully'),'goto'=>route('admin.language')]);
			
		}
	}
}
