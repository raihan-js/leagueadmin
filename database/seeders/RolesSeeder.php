<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'permissions' => ['dashboard', 'leagues', 'teams', 'schedule', 'availability', 'user-management'],
            ],
            [
                'name' => 'League Admin',
                'slug' => 'league-admin',
                'permissions' => ['leagues', 'dashboard', 'teams', 'availability'],
            ],
            [
                'name' => 'Ump/Ref',
                'slug' => 'ump-ref',
                'permissions' => ['leagues', 'teams'],
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role['name'],
                'slug' => $role['slug'],
                'permissions' => json_encode($role['permissions']),
                'status' => true,
                'trash' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
