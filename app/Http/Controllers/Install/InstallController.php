<?php

namespace App\Http\Controllers\Install;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;
use App\Utilities\Installer;
use Validator;
use Hash;

class InstallController extends Controller
{	
	public function __construct()
    {	
		if(env('APP_INSTALLED',false) == true){
			Redirect::to('/')->send();
		}
    }
	
    public function index()
    {
		$requirements = Installer::checkServerRequirements();
        return view('install.step_1',compact('requirements'));
    }
	
	public function database()
    {
		 return view('install.step_2');
    }
	
	public function process_install(Request $request)
    {
		$host = $request->hostname;
		$database = $request->database;
		$username = $request->username;
		$password = $request->password;
		
		if(Installer::createDbTables($host, $database, $username, $password) == false){
           return redirect()->back()->with("error","Invalid Database Settings !");
		}
		
		return redirect('install/create_user');
    }
	
	public function create_user()
    {
		 return view('install.step_3');
	}

	public function store_user(Request $request)
    {
		$validator = Validator::make($request->all(), [	
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',
			'phone' => 'required|string|max:20',
        ]);
		
		if ($validator->fails()) {	
				return redirect()->back()
							->withErrors($validator)
							->withInput();			
		}
		
		$name = $request->name;
		$email = $request->email;
		$password = Hash::make($request->password);
		 $phone = $request->phone;
		
		Installer::createUser($name, $email, $password,$phone);
        
		return redirect('install/system_settings');
    }
	
	public function system_settings()
    {
        return view('install.step_4');
    }
	
	public function final_touch(Request $request)
    {
        Installer::updateSettings($request->all());
        Installer::finalTouches();
		return redirect()->route('admin.login');
    }
    
}
