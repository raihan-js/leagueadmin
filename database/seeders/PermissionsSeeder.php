<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'Dashboard',
                'slug' => 'dashboard',
            ],
            [
                'name' => 'Leagues',
                'slug' => 'leagues',
            ],
            [
                'name' => 'Teams',
                'slug' => 'teams',
            ],
            [
                'name' => 'Schedule',
                'slug' => 'schedule',
            ],
            [
                'name' => 'Availability',
                'slug' => 'availability',
            ],
            [
                'name' => 'User Management',
                'slug' => 'user-management',
            ],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission['name'],
                'slug' => $permission['slug'],
                'status' => true,
                'trash' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
