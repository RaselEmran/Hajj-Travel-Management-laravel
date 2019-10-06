<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class RoleController extends Controller {
	public function index() {

		return view('admin.acl.index');
	}

	public function datatable(Request $request) {

		if ($request->ajax()) {
			$roles = Role::where('name', '!=', config('system.default_role.admin'))->get();
			return Datatables::of($roles)
				->addIndexColumn()
				->addColumn('action', function ($model) {
					return view('admin.acl.action', compact('model'));
				})->rawColumns(['action'])->make(true);
		}
	}

	public function create(Request $request) {

		if ($request->isMethod('get')) {
			$permissions = Permission::all();
			return view('admin.acl.create', compact('permissions'));
		} else {

			$validator = $this->validate($request, [
				'name' => 'required|unique:roles,name|max:255',
			]);

			$role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

			$role->givePermissionTo($request->permissions);

			return response()->json(['success' => true, 'status' => 'success', 'message' => __('Role And Permission Setup'), 'goto' => route('admin.user.role')]);
		}
	}

	public function edit($id) {
		if (!auth()->user()->can('role.update')) {
			abort(403, 'Unauthorized action.');
		}

		if ($id == 1) {
			return abort(404);
		}
		$role = Role::with(['permissions'])
			->find($id);
		$role_permissions = [];
		foreach ($role->permissions as $role_perm) {
			$role_permissions[] = $role_perm->name;
		}

		$role = Role::where('id', $id)->firstOrFail();

		$permissions = Permission::all();
		return view('admin.acl.edit', compact(['role', 'permissions', 'role_permissions']));
	}

	public function update(Request $request) {

		$role = Role::where('id', $request->id)->firstOrFail();

		//dd($request->permission);
		$validator = $request->validate([
			'name' => ['required', 'max:255',
				Rule::unique('roles', 'name')->ignore($role->id)],
		]);

		$role->name = $request->name;
		$role->save();

		$role->syncPermissions($request->permissions);

		return response()->json(['success' => true, 'status' => 'success', 'message' => __('Role And Permission Updated'), 'goto' => route('admin.user.role')]);
	}

	public function distroy(Request $request, $id) {

		if (request()->ajax()) {

			$role = Role::where('id', $id)->firstOrFail();
			$role->delete();

			return response()->json(['success' => true, 'status' => 'success', 'message' => __('Role And Permission Delete')]);
		}
	}

}
