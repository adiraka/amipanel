<?php

use Illuminate\Database\Seeder;

class SentinelUserRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->delete();

        $adminUser = Sentinel::findByCredentials(['login' => 'admin@admin']);
        // $memberUser = Sentinel::findByCredentials(['login' => 'member@member']);
        // $managerUser = Sentinel::findByCredentials(['login' => 'manager@manager']);

        $adminRole = Sentinel::findRoleBySlug('admin');
        // $memberRole = Sentinel::findRoleBySlug('member');
        // $managerRole = Sentinel::findRoleBySlug('manager');

        $adminRole->users()->attach($adminUser);
        // $memberRole->users()->attach($memberUser);
        // $managerRole->users()->attach($managerUser);
    }
}
