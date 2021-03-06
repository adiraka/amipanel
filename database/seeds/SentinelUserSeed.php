<?php

use Illuminate\Database\Seeder;

class SentinelUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('activations')->delete();

        Sentinel::registerAndActivate([
            'email' => 'admin@admin',
            'password' => 'admin',
            'first_name' => 'ADMIN',
            'last_name' => 'AMIPANEL',
        ]);

        // Sentinel::registerAndActivate([
        //     'email' => 'member@member',
        //     'password' => 'member',
        //     'first_name' => 'MEMBER',
        //     'last_name' => 'AMIPANEL',
        // ]);
        //
        // Sentinel::registerAndActivate([
        //     'email' => 'manager@manager',
        //     'password' => 'manager',
        //     'first_name' => 'MANAGER',
        //     'last_name' => 'AMIPANEL',
        // ]);
    }
}
