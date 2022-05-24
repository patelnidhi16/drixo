<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        $admin = Admin::create([
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin'),
            'assign_role' => 'Administration',
        ]);
        $admin->assignRole(['Administration']);
    }
}
