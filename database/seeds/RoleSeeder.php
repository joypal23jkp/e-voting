<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'admin',
            'role_description' => 'Admin Roles with most access.',
            'role_priority' => 3,
        ]);
        DB::table('roles')->insert([
            'role_name' => 'moderator',
            'role_description' => 'Admin Roles with less access.',
            'role_priority' => 2,
        ]);
        DB::table('roles')->insert([
            'role_name' => 'editor',
            'role_description' => 'Admin Roles with editing access.',
            'role_priority' => 1,
        ]);
        DB::table('roles')->insert([
            'role_name' => 'student',
            'role_description' => 'User Roles with basic voting access.',
            'role_priority' => -2,
        ]);
        DB::table('roles')->insert([
            'role_name' => 'candidate',
            'role_description' => 'user Roles with voting and candidate access.',
            'role_priority' => -1,
        ]);
    }

}
