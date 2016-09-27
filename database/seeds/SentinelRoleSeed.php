<?php

use Illuminate\Database\Seeder;

class SentinelRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
        $role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Member',
            'slug' => 'member',
        ]);
        $role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Manager',
            'slug' => 'manager',
        ]);
    }
}
