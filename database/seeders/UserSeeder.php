<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'MP3000',
            'email' => 'mperret@mp3000.fr',
            'email_verified_at' => new \DateTime(),
            'password' => Hash::make('Test2000!'),
            'profile_id' => 1,
            'created_at' => new DateTime(),
        ]);
    }

}
