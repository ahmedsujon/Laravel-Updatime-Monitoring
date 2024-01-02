<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getSAdmin = Admin::where('email', 'admin@example.com')->first();

        if (!$getSAdmin) {
            $admin = new Admin();
            $admin->name = 'Nz Coding';
            $admin->email = 'admin@example.com';
            $admin->phone = '01700000000';
            $admin->password = Hash::make('12345678');
            $admin->avatar = 'assets/images/avatar.png';
            $admin->type = 'super_admin';
            $admin->permissions = json_encode(Permission::pluck('id')->toArray());
            $admin->save();
        }

        $getAdmin = Admin::where('email', 'admin01@example.com')->first();

        if (!$getAdmin) {
            $admin = new Admin();
            $admin->name = 'Mr Admin 01';
            $admin->email = 'admin01@example.com';
            $admin->phone = '01700000001';
            $admin->password = Hash::make('12345678');
            $admin->avatar = 'assets/images/avatar.png';
            $admin->type = 'admin';
            $admin->permissions = json_encode(array(2,3));
            $admin->added_by = '1';
            $admin->save();
        }
    }
}
