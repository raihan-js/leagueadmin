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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Admin::create([
            'name'          => 'Super Admin',
            'email'         => 'admin@leagueadmin.net',
            'phone'         => '+14842634825',
            'username'      => 'superadmin',
            'user_type'     => 'Super Admin',
            'teams'         => 'All',
            'slack_id'      => 'UA018JHYGB',
            'password'      => Hash::make('12345')
        ]);
    }
}
