<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Admin;

class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);
           $user =Admin::find(1);
        $user->assignRole($role->name);
    }
}
