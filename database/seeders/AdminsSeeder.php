<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = Carbon::now();
        $admins = [
            [
                'name' => 'Mark Jackson',
                'email' => 'mark@example.com',
                'username' => 'mark_jackson',
                'phone' => '+1234567890',
                'password' => Hash::make('password123'),
                'user_type' => 'Admin',
                'teams' => 'All',
                'slack_id' => 'UA123XYZ',
                'role_id' => 1, // Admin role ID
                'access_token' => null,
                'status' => true,
                'trash' => false,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Ray Brown',
                'email' => 'ray@example.com',
                'username' => 'ray_brown',
                'phone' => '+9876543210',
                'password' => Hash::make('password123'),
                'user_type' => 'Admin',
                'teams' => 'All',
                'slack_id' => 'UA456ABC',
                'role_id' => 2, // League Admin role ID
                'access_token' => null,
                'status' => true,
                'trash' => false,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Gary Hart',
                'email' => 'gary@example.com',
                'username' => 'gary_hart',
                'phone' => '+1112223333',
                'password' => Hash::make('password123'),
                'user_type' => 'Admin',
                'teams' => 'All',
                'slack_id' => 'UA789DEF',
                'role_id' => 3, // Ump/Ref role ID
                'access_token' => null,
                'status' => true,
                'trash' => false,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'James Taylor',
                'email' => 'james@example.com',
                'username' => 'james_taylor',
                'phone' => '+4445556666',
                'password' => Hash::make('password123'),
                'user_type' => 'Admin',
                'teams' => 'All',
                'slack_id' => 'UA012GHI',
                'role_id' => 3, // Ump/Ref role ID
                'access_token' => null,
                'status' => true,
                'trash' => false,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ];

        foreach ($admins as $admin) {
            DB::table('admins')->insert($admin);
        }
    }
}
