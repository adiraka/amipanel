<?php

use Illuminate\Database\Seeder;

class EmployeeSeed extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('employees')->delete();

        $adminUser = Sentinel::findByCredentials(['login' => 'admin@admin']);
        // $memberUser = Sentinel::findByCredentials(['login' => 'member@member']);
        // $managerUser = Sentinel::findByCredentials(['login' => 'manager@manager']);

        DB::table('employees')->insert([
        	'user_id' => $adminUser->id,
        	'name' => $adminUser->first_name . ' ' . $adminUser->last_name,
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // DB::table('employees')->insert([
        // 	'user_id' => $memberUser->id,
        // 	'name' => $memberUser->first_name . ' ' . $memberUser->last_name,
        // 	'created_at' => date("Y-m-d H:i:s"),
        // 	'updated_at' => date("Y-m-d H:i:s"),
        // ]);
        //
        // DB::table('employees')->insert([
        // 	'user_id' => $managerUser->id,
        // 	'name' => $managerUser->first_name . ' ' . $managerUser->last_name,
        // 	'created_at' => date("Y-m-d H:i:s"),
        // 	'updated_at' => date("Y-m-d H:i:s"),
        // ]);
    }
}
