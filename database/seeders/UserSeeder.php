<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Find the role ID for 'Admin' or create one if it does not exist
        $adminRole = Role::where('nom', 'Admin')->first();
        
        if (!$adminRole) {
            $adminRole = Role::create(['nom' => 'Admin']);
        }

        // Create an Admin user
        User::create([
            'nom' => 'Admin',
            'prenom' => 'Admin',
            'date_naissance' => '2000-12-03', 
            'contact' => '91595914', 
            'email' => 'admin@ciscodev.tg',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);
    }
}
