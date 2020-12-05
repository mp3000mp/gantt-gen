<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'name' => 'Admin',
            'code' => 'ADM',
            'created_at' => new DateTime(),
        ]);
        DB::table('profiles')->insert([
            'name' => 'User',
            'code' => 'USER',
            'created_at' => new DateTime(),
        ]);

        DB::table('profile_role')->insert([
            'profile_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('profile_role')->insert([
            'profile_id' => 1,
            'role_id' => 2,
        ]);

    }
}
