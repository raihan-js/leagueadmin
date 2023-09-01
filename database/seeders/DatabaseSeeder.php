<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Super admin creation seeder
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@leagueadmin.net',
            'phone' => '+14842634825',
            'username' => 'superadmin',
            'user_type' => 'Super Admin',
            'teams' => 'All',
            'slack_id' => 'UA018JHYGB',
            'password' => Hash::make('12345'),
        ]);
    }
}
