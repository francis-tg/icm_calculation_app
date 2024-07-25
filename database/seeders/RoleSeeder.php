<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Array of roles to insert
        $roles = [
            ['nom' => 'Admin'],
            ['nom' => 'User'],
        ];

        // Insert roles into the database
        DB::table('roles')->insert($roles);
    }
}
