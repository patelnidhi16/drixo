<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $module_array = array(
            'Subject' => 'subject',
            'AssignTest' => 'assigntest',
            'DisplayResult' => 'displayresult',
            'Test' => 'test',
            'Role' => 'role',
            'Admin' => 'admin',
        );
        foreach ($module_array as $key => $val) {
            $permissions = array();

            $create_per = $val . '_create';
            $update_per = $val . '_update';
            $view_per = $val . '_view';
            $delete_per = $val . '_delete';
            $status_per = $val . '_status';

            $permissions[] = $create_per;
            $permissions[] = $update_per;
            $permissions[] = $view_per;
            $permissions[] = $delete_per;
            $permissions[] = $status_per;
            foreach ($permissions as $permission) {
                DB::table('permissions')->insert([
                    'name' => $permission,
                    'guard_name' => 'admin',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
