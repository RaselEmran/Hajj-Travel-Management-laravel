<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller {

	private function route() {
		return 'admin.user.';
	}
	public function index(Request $request) {

		return view('admin.user.index');
	}

	public function datatable(Request $request) {
		if (request()->ajax()) {
			$users = Admin::all()->except(1);
			return Datatables::of($users)
				->addIndexColumn()
				->addColumn('action', function ($model) {
					return view('admin.user.action', compact('model'));
				})
				->addColumn('role', function ($model) {
					return $role_name = getUserRoleName($model->id);
				})
				->editColumn('status', function ($model) {
					$route = $this->route();
					return view('admin.status', compact('model','route'));
				})
				->rawColumns(['action', 'status'])->make(true);

		}
	}

	public function create(Request $request) {
		if (!auth()->user()->can('user.create')) {
			abort(403, 'Unauthorized action.');
		}

		if ($request->isMethod('get')) {
			$roles = Role::where('name', '!=', config('system.default_role.admin'))->get()->pluck('name', 'id')->prepend('Select Role...', '');
			return view('admin.user.create', compact('roles'));
		} else {
			$validator = $request->validate([
				'surname' => 'required', 'max:255',
				'first_name' => 'required', 'max:255',
				'last_name' => 'required', 'max:255',
				'username' => ['required', 'string', 'max:255', 'unique:admins'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
				'password' => ['required', 'string', 'min:6', 'confirmed'],
			]);

			$user = new Admin;
			$user->surname = $request->surname;
			$user->first_name = $request->first_name;
			$user->last_name = $request->last_name;
			$user->username = $request->username;
			$user->email = $request->email;
			$user->username = $request->username;
			$user->password = bcrypt($request->password);
			// $user->activation_token = Str::uuid();
			$user->status = 'activated';
			$user->save();

			$role_id = $request->input('role');
			$role = Role::findOrFail($role_id);
			$user->assignRole($role->name);

			return response()->json(['success' => true, 'status' => 'success', 'message' => __('User Created'), 'goto' => route('admin.user.index')]);
		}
	}

	public function edit($id) {
		if (!auth()->user()->can('user.update')) {
			abort(403, 'Unauthorized action.');
		}
		$user = Admin::find($id);
		$roles = Role::where('name', '!=', config('system.default_role.admin'))->get()->pluck('name', 'id')->prepend('Select Role...', '');
		return view('admin.user.edit', compact('user', 'roles'));
	}

	public function status(Request $request, $value, $id) {
		if (!auth()->user()->can('user.update')) {
			abort(403, 'Unauthorized action.');
		}

		if (request()->ajax()) {
			$user = Admin::find($id);
			$user->status = $value;
			$user->save();

			return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Status Updated')]);
		}
	}

	public function update(Request $request) {
		if (!auth()->user()->can('user.update')) {
			abort(403, 'Unauthorized action.');
		}

		if (request()->ajax()) {
			$id = $request->id;
			$user = Admin::findOrFail($id);
			$validator = $request->validate([

				'surname' => ['required', 'max:255'],
				'first_name' => ['required', 'max:255'],
				'last_name' => ['required', 'max:255'],
				'username' => ['required', 'string', 'max:255',
					Rule::unique('admins', 'username')->ignore($user->id)],
				'email' => ['required', 'string', 'email', 'max:255',
					Rule::unique('admins', 'email')->ignore($user->id)],

			]);

			$user->surname = $request->surname;
			$user->first_name = $request->first_name;
			$user->last_name = $request->last_name;
			$user->username = $request->username;
			$user->email = $request->email;
			$user->username = $request->username;
			$user->password = Hash::make($request->password);

			$role_id = $request->input('role');
			$user_role = $user->roles->first();

			if ($user_role->id != $role_id) {
				$user->removeRole($user_role->name);

				$role = Role::findOrFail($role_id);
				$user->assignRole($role->name);
			}

			return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('User Updated'), 'goto' => route('admin.user.index')]);

		}
	}

	public function destroy(Request $request, $id) {
		if (!auth()->user()->can('user.delete')) {
			abort(403, 'Unauthorized action.');
		}

		if (request()->ajax()) {

			$user = Admin::find($id);
			$user->delete();
			return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('User Deleted')]);
		}
	}
}
